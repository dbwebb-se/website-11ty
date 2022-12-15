---
author: mos
revision:
    "2017-02-23": (A, mos) Kopierad från GoogleDocs och översatt till svenska samt aningen modifierad.
...
Projekt: Internetbanken
==================================

Du är en senior konsult på företaget "HögProfilKonsultMedSlips". Du har tilldelats en uppgift att utveckla en Internetbank till den svenska kunden, "BankBluffOBåg AB".

Du har en case study som någon har förberett. Du har även kraven på systemet. Din uppgift är nu att implementera Internetbanken (IB).

Lycka till!



Case study {#studie}
--------------------------------------------------------------------

This is the case study on IB.



###Account and account holders {#account}

The IB shall provide bank accounts for persons (account holders). An account holder can have several accounts. Each account can be shared between two or more account holders.

The bank cashier creates new accounts and new account holders. The cashier manages which account holder(s) that can access an account. It is the cashier that initiates the procedure where several account holders share one account.

Information on an account holder is name, birth date, street and city of residence. A user-id is created for each account holder. This is to be used for access verification. A 4-digit pin-code shall also be created for each account holder.

Information related to an account is the balance and the account number.



###Account holder access {#holder}

The account holder can access their accounts by a web interface. They shall be able to list their accounts with the balance. It shall be visible if the account is shared with another account holder.

The account holder can move money between their own accounts. Each time they move money they need to pay 3% of the moved amount to your own special account. You wish a larger lodge in Spain.



###Swishing the money {#swish}

The account holders can use their moneys through a mobile application where they can swish money to another account holder. Swishing is done by, using the swish application, inserting the user-id and a 4-digit pin-code followed by the account number, the amount to swish and the receiving account number. The pin-code is private for each account holder.

Each time a swish is done shall additionally 2% of the swished amount be taken from the senders account and stored in your own personal account. See this as your insurance for days to come; perhaps a nice lodge in sunny Spain can come out of this.



###Calculating interest {#calculate}

The calculation of interest is done on a daily basis. It is performed manually by executing a stored procedure that calculates the interest for each account. The procedure takes the following arguments; interestRate, dateOfCalculationDay. The interest is calculated by `interestRate * balance / 365`.

The result shall be stored in a separate table with the values of the calculated interest, date for calculation, and account number. The accumulated interest for a specific account can be calculated by summing all entries, for the specific account, in this table.



###Logging {#log}

A log entry shall be written to a log table each time the balance is updated for an account. The entry should consist of the account number, amount and time.



Requirements on Applications {#reqs}
--------------------------------------------------------------------

You shall develop the following end-user applications:

* Management reports
* Administration interface for the cashier
* A swish application
* An interface for the account holder



###Management reports {#reportsint}

The following reports should be supported:

* Present all entries in the log table.
* Show all account holders with their accounts and balance.
* Show the accumulated interest for each account.
* Show the content of your own special account where all transaction fees goes. (This one is for the nice lodge in Sunny Spain).

The management reports should be implemented as stored procedures and should be executed through a MySQL client (Workbench and CLI).



###Administration interface for the cashier {#adminint}

The following tasks shall be supported:

* Add an account holder with all needed information.
* Add a new account and connect it to an account holder.
* Connect an additional account holder to an existing account.

The admin interface shall be implemented using a Node.js CLI program (or a web interface).



###A swish application {#swishapp}

The following task shall be supported:

* Swish money by inserting user-id, pin-code, sending and receiving account number and amount.

Implement the application as a CLI program or a web interface through Node.js.



###An interface for the account holder {#webint}

The following tasks/reports shall be supported, use user-id and pin-code for verification:

* Show all accounts for an account holder.
* Make it visible if the account is shared with other account holders (show their names).
* Create a new account.
* Move money between their own accounts.

Implement this part as a web interface.



###Additional reports {#morereports}

The following tasks shall be supported using SQL, procedures, etc.

* Insert money to an account
* Perform the calculation of interests for a specific day.

Implement these as stored procedures and execute through MySQL Workbench/CLI.



###Other {#other}

Try to build a good structure of your database and provide a good API for the database reports through procedures, functions, triggers and views.

Ensure that your reports/tasks works in the database before you try to integrate them with the various GUIs.



Requirements on presenting the project {#redovisning}
--------------------------------------------------------------------



###The database {#db}

The database must contain at least the following data:

* At least 10 account holders and at least 20 accounts.
* At least 3 account holders shall share 3 or more accounts.
* You should have made calculation of interest for at least 10 different dates.



###The documentation {#docs}

The documentation should be proper, nice-looking and complete.

Document the database in line with the intentions of "[Kokbok för databasmodellering](kunskap/kokbok-for-databasmodellering)".

Document your applications.

* Describe the intention of each application.
* A screenshot could enhance the documentation.

Make it look nice.

Upload the documentation on [ITs](bth#its) as one pdf-document.



###The presentation {#present}

You are to show the following at the presentation:

* Your client applications are performing according to the requirements.
* Show that your database reports/tasks works without the GUIs.
* Show the documentation.
