---
author: moc
category:
    - devops
    - flask
    - python
    - sql
revision:
    "2021-10-29": (b, aar) Byte .format() till f-strings.
    "2020-09-29": (A, moc) Skapad inför HT2020.
...
Kom igång med followers - Microblog {#intro}
=============================================

I denna artikeln ska vi jobba igenom [kapitel 8](https://blog.miguelgrinberg.com/post/the-flask-mega-tutorial-part-viii-followers) i Miguel's guide, så att vi kan följa andra användare och se deras inlägg på sin egna feed.

<!--more-->

Vi kommer främst att jobba med `SQLAlchemy ORM` i python ramverket `flask` och `pylint` för att skriva enhetstester till de nya uppdateringarna.


Förutsättningar {#prereq}
--------------------------
Du har läst och kollat igenom [introduktion till devops appen](kunskap/introduktion_till_devops_appen) och fått igång applikationen.


Steg 1. Databas {#step1-databas}
---------------------------------
Just nu består databasen två tabeller, `User` som håller koll på alla användare och `Post` som hanterar inläggen.   
Det vi skall göra nu är att utöka databasen så att användare kan följa varandra. För det skapar vi en en associeringstabell som skall ha två värden, första är användarens `user_id` och den andra är id't på personen den första användaren vill följa.

Vi börjar med att skapa den nya modellen `followers` i filen `app/models.py` och lägger vår kod ovanför klassen `User`.

```python
followers = db.Table('followers',
    db.Column('follower_id', db.Integer, db.ForeignKey('user.id')),
    db.Column('followed_id', db.Integer, db.ForeignKey('user.id'))
)
# ..
```

Anledningen varför vi inte gjorde `followers` tabellen till en klass som de andra är att den endast skall hålla två stycken `foreign keys`. Den kommer alltså inte hålla någon annan information eller funktionalitet. Istället skall vi koppla den till `User` -modellen så att vi enkelt kan hålla koll på vem användaren följer. Detta kan kan göras med hjälp av `db.relationship()`:

```python
class User(UserMixin, db.Model):
    # ...
    followed = db.relationship(
        'User', secondary=followers,
        primaryjoin=(followers.c.follower_id == id),
        secondaryjoin=(followers.c.followed_id == id),
        backref=db.backref('followers', lazy='dynamic'), lazy='dynamic')
```

Den första parametern `'User'` är strängnamnet på den främmande tabellens klassnamn och eftersom vi skapar en relation från en `User` till en annan, refererar vi den till sig själv.   
Nästa argument `secondary` sätts till associeringstabell variabelnamn så att den vet vart datan skall sparas. Medans `primaryjoin` och `secondaryjoin` berättar hur kopplingen mellan User modellen kopplas till followers och lika så hur followers kopplas till User.   
Den sista parametern `backref` definierar hur vi skall hämta datan när `User.followed` kallas. 

Eftersom vi nu skapade en ny tabell samnt lade till en extra kollumn i `User` måste nu uppdatera våran databasmigration:

```bash
╰─ (venv) $ flask db migrate -m "followers"
INFO  [alembic.runtime.migration] Context impl SQLiteImpl.
INFO  [alembic.runtime.migration] Will assume non-transactional DDL.
INFO  [alembic.autogenerate.compare] Detected added table 'followers'
  Generating /home/moc/git/kurser/microblog/migrations/versions/ab124256c621_followers.py ... done

╰─ (venv) $ flask db upgrade
INFO  [alembic.runtime.migration] Context impl SQLiteImpl.
INFO  [alembic.runtime.migration] Will assume non-transactional DDL.
INFO  [alembic.runtime.migration] Running upgrade 37f06a334dbf -> ab124256c621, followers
```

Nu så skall vår nya databas version vara genererad och satt som den aktiva versionen.


Steg 2. Lägga till och ta bort "follows" {#step2-add-remove-followers}
--------------------------------------------------------------------------
Vi använder oss utav [`SQLAlchemy`](https://www.sqlalchemy.org/) som en typ av ORM (objekt-relationell mappning). Denna modul gör det lätt att hantera relationer mellan tabeller. Den agerar som att relationerna vore listor, exempelvis, om `user1` vill börja följa en ny användare (`user2`), kan man bara kalla på `list.append()` för att lägga till den nya användaren:

```python
user1.followed.append(user2)
```

En "unfollow" kan hanteras på ett liknande sätt:

```python
user1.followed.remove(user2)
```

Även om det är lätt att lägga till och ta bort följare skall vi lägga till tre nya metoder i `User` modellen. Detta är mest för att vi kan återanvända koden men det kommer också att underlätta testerna som vi skall göra lite senare:

```python
class User(UserMixin, db.Model):
    #...
    def follow(self, user):
        if not self.is_following(user):
            self.followed.append(user)

    def unfollow(self, user):
        if self.is_following(user):
            self.followed.remove(user)

    def is_following(self, user):
        return self.followed.filter(
            followers.c.followed_id == user.id).count() > 0
```

`follow()` och `unfollow()` använder samma kod som vi gick igenom tidigare, skillnaden är att vi lägger till en extra koll `is_following()` för att undvika dubbletter om relationen redan existerar. Samma logik kan appliceras när man skall göra en "unfollow".


Steg 3. Hämta inlägg från använade man följer {#step3-collect-posts}
----------------------------------------------------------------------
Nu är vi nästan helt klara, det vi behöver lägga till är att appen även skall skriva ut alla inlägg från användaren man följer. Så vi lägger till yttligare en metod `followed_posts` som löser problemet.


```python
class User(UserMixin, db.Model):
    #...
    def followed_posts(self):
        return Post.query.join(
            followers, (followers.c.followed_id == Post.user_id)).filter(
                followers.c.try == self.id).order_by(
                    Post.timestamp.desc())
```

Queryn som returneras fungerar fast den hämtar inte personens egna inlägg. Det enklaste sättet skulle vara att användarna följde sig själva men det är kommer inte att hålla i längden. Så istället skapar vi en till query `own` som hämtar ut sina egna inlägg och returnerar en `union` båda.

```python
def followed_posts(self):
        followed = Post.query.join(
            followers, (followers.c.followed_id == Post.user_id)).filter(
                followers.c.follower_id == self.id)
        own = Post.query.filter_by(user_id=self.id)
        return followed.union(own).order_by(Post.timestamp.desc())
```


Steg 4. Lägg till enhetstester {#step4-unittests}
--------------------------------------------------

Även om vi inte har gjort några större ändringar i koden vill vi se så försäkra oss om att allting fungerar, både nu och i framtiden när saker ändras. Vi använder oss utav modulen `pytest` för att skriva våra tester som i senare kursmoment, skall köras automatiskt när vi pushar upp vår kod.

```python
# pylint: disable=redefined-outer-name
from datetime import datetime, timedelta
from unittest import mock
import pytest
from app.models import User, Post
from app import db

...

def test_follow(test_app): # pylint: disable=unused-argument
    """
    Test that follow appends new Users to followed.
    Test that unfollow removes the User from followed.
    """
    user1 = User(username='john', email='john@example.com')
    user2 = User(username='susan', email='susan@example.com')
    db.session.add(user1)
    db.session.add(user2)
    db.session.commit()
    assert user1.followed.all() == []

    user1.follow(user2)
    db.session.commit()

    assert user1.is_following(user2) is True
    assert user1.followed.count() == 1
    assert user1.followed.first().username == "susan"
    assert user2.followers.count() == 1
    assert user2.followers.first().username == "john"

    user1.unfollow(user2)
    db.session.commit()
    assert user1.is_following(user2) is not True
    assert user1.followed.count() == 0
    assert user1.followers.count() == 0

def test_follow_posts(test_app): # pylint: disable=unused-argument
    """
    Test that all personal and posts from followed users are shown.
    """
    # create four users
    user1 = User(username='john', email='john@example.com')
    user2 = User(username='susan', email='susan@example.com')
    user3 = User(username='mary', email='mary@example.com')
    user4 = User(username='david', email='david@example.com')
    db.session.add_all([user1, user2, user3, user4])

    # create four posts
    now = datetime.utcnow()
    post1 = Post(body="post from john", author=user1,
                 timestamp=now + timedelta(seconds=1))
    post2 = Post(body="post from susan", author=user2,
                 timestamp=now + timedelta(seconds=4))
    post3 = Post(body="post from mary", author=user3,
                 timestamp=now + timedelta(seconds=3))
    post4 = Post(body="post from david", author=user4,
                 timestamp=now + timedelta(seconds=2))
    db.session.add_all([post1, post2, post3, post4])
    db.session.commit()

    # setup the followers
    user1.follow(user2)  # john follows susan
    user1.follow(user4)  # john follows david
    user2.follow(user3)  # susan follows mary
    user3.follow(user4)  # mary follows david
    db.session.commit()

    # check the followed posts of each user
    follow1 = user1.followed_posts().all()
    follow2 = user2.followed_posts().all()
    follow3 = user3.followed_posts().all()
    follow4 = user4.followed_posts().all()
    assert follow1 == [post2, post4, post1]
    assert follow2 == [post2, post3]
    assert follow3 == [post3, post4]
    assert follow4 == [post4]
```

Utöver att vi skapar nya användare, kollar så att de kan göra follows/unfollows ser vi också till att testa om inläggen renderas på det sätt vi tänkte oss när de användaren följer lägger till nya poster.

Vi kan nu köra `make test-unit` för att kontrollera om våra nya tester går igenom:

```bash
╰─ (venv) $ make test-unit
find . -name '*.pyc' -exec rm -f {} +
find . -name '*.pyo' -exec rm -f {} +
find . -name '__pycache__' -exec rm -fr {} +
find . -name '.pytest_cache' -exec rm -fr {} +
rm -f .coverage
rm -rf tests/coverage_html
find . -name '*~' -exec rm -f {} +
find . -name '*.log*' -exec rm -fr {} +
---> Running all tests in tests/unit
==================================================== test session starts ====================================================
platform darwin -- Python 3.7.3, pytest-6.1.1, py-1.9.0, pluggy-0.13.1
rootdir: /home/moc/git/kurser/microblog/tests/unit, configfile: ../../pytest.ini
collected 12 items

tests/unit/auth/forms/test_registration_form.py ....                                                                  [ 33%]
tests/unit/main/forms/test_edit_profile_form.py ..                                                                    [ 50%]
tests/unit/models/test_post.py .                                                                                      [ 58%]
tests/unit/models/test_user.py .....                                                                                  [100%]

==================================================== 12 passed in 0.69s =====================================================
/Library/Developer/CommandLineTools/usr/bin/make clean-py
find . -name '*.pyc' -exec rm -f {} +
find . -name '*.pyo' -exec rm -f {} +
find . -name '__pycache__' -exec rm -fr {} +
find . -name '.pytest_cache' -exec rm -fr {} +
```


Steg 5. Integrera följare med applikationen {#step5-integrate}
---------------------------------------------------------------
Funktionaliteten för backenden är klar och går igenom testerna, det som nu behövs göras är att lägga till två nya routes i `app/main/routes.py` som hanterar följande av användare:


```python
"""
Contains routes for main purpose of app
app/main/routes.py
"""
from datetime import datetime
from flask import render_template, flash, redirect, url_for, request, current_app
from flask_login import current_user, login_required
from app import db
from app.main.forms import EditProfileForm, PostForm
from app.models import User, Post
from app.main import bp


# ...
@bp.route('/follow/<username>')
@login_required
def follow(username):
    """
    Follow a User
    """
    user_ = User.query.filter_by(username=username).first()
    if user_ is None:
        flash(f'User {username} not found.')
        return redirect(url_for('index'))
    if user_ == current_user:
        flash('You cannot follow yourself!')
        return redirect(url_for('user', username=username))
    current_user.follow(user_)
    db.session.commit()
    flash(f'You are following {username}!')
    return redirect(url_for('main.user', username=username))

@bp.route('/unfollow/<username>')
@login_required
def unfollow(username):
    """
    Unfollow a User
    """
    user_ = User.query.filter_by(username=username).first()
    if user is None:
        flash(f'User {username} not found.')
        return redirect(url_for('index'))
    if user_ == current_user:
        flash('You cannot unfollow yourself!')
        return redirect(url_for('user', username=username))
    current_user.unfollow(user_)
    db.session.commit()
    flash(f'You are not following {username}.')
    return redirect(url_for('main.user', username=username))
```

Flask och SQLAlchemy hanterar det mesta, `current_user` är den inloggade användaren och `username` användarnamnet skickas med i urlen.

Båda routerna har samma logik, först kollar den om användaren existerar i databasen och sedan kollar den så att man inte försöker lägga till eller sig själv från listan.

Går dessa kontroller igenom committar vi ändringen i databasen, sätter en bekräftelse att ändringen har skett och redirectar oss till `/user/<username>`.   

Vi behöver också uppdatera två routes i samma fil.

```python
@bp.route('/', methods=['GET', 'POST'])
@bp.route('/index', methods=['GET', 'POST'])
@login_required 
def index():
    """
    Route for index page
    """
    form = PostForm()
    if form.validate_on_submit():
        post = Post(body=form.post.data, author=current_user)
        current_app.logger.debug(f"{post}")
        db.session.add(post)
        db.session.commit()
        flash('Your post is now live!')
        return redirect(url_for('main.index'))

    posts = current_user.followed_posts().all()
    return render_template("index.html", title='Home Page', form=form,
                           posts=posts)

# ...
@bp.route('/user/<username>')
@login_required
def user(username):
    """
    Route for user
    """
    user_ = User.query.filter_by(username=username).first_or_404()
    posts = user_.posts.all()
    return render_template('user.html', user=user_, posts=posts)
```

I `index` routen ändrar vi vilken data som hämtas, i detta fallet vill vi ladda in allt från `followed_posts()`, så att alla inlägg från de vi följer plus ens egna, visas i flödet.   
Sedan ändrar vi även vad som laddas in när vi besöker en användares sida, då vi endast vill ladda in hens inlägg.


Det sista som återstår är nu att visa upp en länk som användaren kan klicka på för att antingen editera sin profil, följa eller avfölja användaren man kollar på.

```html
<!-- app/templates/user.html -->
{% extends "base.html" %}

{% block app_content %}
    <table>
        <tr valign="top">
            <td><img src="{{ user.avatar(128) }}"></td>
            <td>
                <h1>User: {{ user.username }}</h1>
                {% if user.about_me %}<p>{{ user.about_me }}</p>{% endif %}
                {% if user.last_seen %}<p>Last seen on: {{ user.last_seen }}</p>{% endif %}
                <p>{{ user.followers.count() }} followers, {{ user.followed.count() }} following.</p>
                {% if user == current_user %}
                <p><a href="{{ url_for('main.edit_profile') }}">Edit your profile</a></p>
                {% elif not current_user.is_following(user) %}
                <p><a href="{{ url_for('main.follow', username=user.username) }}">Follow</a></p>
                {% else %}
                <p><a href="{{ url_for('main.unfollow', username=user.username) }}">Unfollow</a></p>
                {% endif %}
            </td>
        </tr>
    </table>
    <hr>
    {% for post in posts %}
        {% include '_post.html' %}
    {% endfor %}
{% endblock %}
```

Nu är allt klart, prova att starta applikationen och kolla så att allt fungerar. Det finns inget sätt att lista alla användare just nu, för att se kunna se en användare behöver du då gå in på deras url. E.g om vi skall titta på *svens* profil `http://localhost:5000/user/sven`.


Sammanfattningsvis {#sammanfattningsvis}
---------------------------------------------------------------
I devops jobbar vi med att utveckla, testa, automatisera och driftsätta projekt.
Även om vi bara har gjort lite av de två första delarna kommer ni snart att få smak på hur hela processen kan gå till.

Ni behöver inte kunna allt som står i artikeln men, håll i alla fall lite koll på hur appen fungerar. Kolla gärna igenom [introduktionen till devops appen](kunskap/introduktion_till_devops_appen) en gång till om något är oklart.

Hojta till i Discord om ni kör fast eller har andra funderingar. Annars är det bara att och kör på, lycka till!