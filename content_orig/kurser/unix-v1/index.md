---
title: unix-v1
author:
    - efo
    - lew
revision:
    "2019-08-16": (A, efo, lew) Första revisionen inför kursstart HT2019.
...
UNIX
==================================

**UNIX and Linux, an overview and introduction** aka _unix_ introduces students to the command prompt, basic tools and commands, their areas of application, and ways to combine them into larger workflows.

This is course material for the two courses **DV1466** and **DV1563**. **DV1466** completes four assignments, **DV1563** completes the last 3 out of the four assignments.



<!--more-->



Lab environment requirements {#labb}
------------------------

In the course, you install a Linux operating system on your own machine with the virtualization system VirtualBox. You need a computer with at least 8GB of internal memory for it to work well. With less internal memory, it takes longer to complete the exercises and it can feel sluggish.

You can also perform the installation on another computer, an older laptop for example. Or you can use virtual servers that you install on your own.

In short, you should install a linux server and you need a good enough environment for it to work without any worries.



Prerequisites {#prerequisites}
------------------------

> General requirements for university studies.



Content {#content}
------------------------

The key components of the course are:

* comparison between dialogue based on the
command line interface and graphical user interface
(GUI) with predefined menu selections

* use of pipelines as a method for incremental
development based on problem specifications and
partial solutions for advanced testing

* operating systems based on files: introduction to
hierarchical filing systems, the taxonomy problem
and its solution through hard and soft links,
streams, authorisation and ownership

* text as a general format for semi-structured data:
creation, extraction, processing and output of
multi-level delimiters (e.g. fields and posts).
Operations of filtering and limiting, and how they
can be constructed from standard commands such
as head, tail, awk, grep and sed (POSIX standard)

* methods to combine different tools: string
escaping, embedded commands and expansions, regular expressions, pipelines and redirection



Aims and learning outcomes {#outcomes}
------------------------

#### Knowledge and understanding

On completion of the course, the students shall be
able to:

* demonstrate an understanding of the functionality
of the POSIX core tools

#### Competence and skills

On completion of the course, the students shall be
able to:

* break down problems into smaller parts with
well-defined inputs and outputs
* analyse the usefulness of tools in different
problem-solving phases
* create suitable test data for both partial and
holistic solutions, and identify test cases
* integrate partial solutions into holistic solutions to
solve problems.



Assignment prerequisites {#aprerequisites}
------------------------

Complete all steps of the [VirtualBox guide](guide/virtualbox_en).

All assignments and the following installation guide should be completed inside the installed virtual environment.

Install the lab environment by completing the steps in the [`dbwebb` installation guide](kurser/unix-v1/installera-labbmiljo).



Assignments {#assignments}
------------------------

The course is divided into several assignments.

### Assignment 1: Apache Virtual Hosts {#kmom01}

[INFO]
Only DV1466 should do Assignment 1: Apache Virtual Hosts.
[/INFO]

The first assignment is about using your newly installed Debian server as a web server to host a small web page.

[Instructions](kurser/unix-v1/kmom01).



### Assignment 2: Bash {#kmom02}

In this assignment we will take a look at the Bash programming language by completing a series of exercises.

[Instructions](kurser/unix-v1/kmom02).



### Assignment 3: Regular expressions {#kmom03}

The third assignment uses the built-in Linux program `sed` and regular expressions to filter large amounts of data.

[Instructions](kurser/unix-v1/kmom03).



### Assignment 4: Mazerunner {#kmom04}

In this assignment you will work with server-client communication by writing a Bash program that can take you through a maze like MazeRunner.

[Instructions](kurser/unix-v1/kmom04).



Literature {#litteratur}
----------------------------

* **[The Linux Command Line](kunskap/boken-the-linux-command-line)** -- William Shotts
    An easy-to-read and pleasant book with an open license that makes the book available freely on the book's website. The book gives a good introduction to the Linux beginner, system commands and the terminal.



Ladok {#ladok}
------------------------

According to the syllabus, there are a number of ladok moments and they are linked to the course parts as follows.

| Assignments     | Ladok credits in course plan        | DV1466 | DV1563 |
|-----------------|-------------------------------------|--------|--------|
| Assignment 1    | Written assignment 1 - 1.5 hp - A-F | X      |        |
| Assignment 2    | Written assignment 2 - 2.0 hp - A-F | X      | X      |
| Assignment 3    | Written assignment 3 - 2.0 hp - A-F | X      | X      |
| Assignment 4    | Written assignment 4 - 2.0 hp - A-F | X      | X      |



Grading {#grade}
------------------------

The final grade in the course is given based on points obtained during the course. To get a final grade all assignments in your particular course need to be passed.

### Grading in DV1466

| Points    | Grade        |
|-----------|--------------|
| 80        | A            |
| 70+       | B            |
| 60+       | C            |
| 50+       | D            |
| 40+       | E            |
| -40       | F            |



### Grading in DV1563

| Points    | Grade        |
|-----------|--------------|
| 60        | A            |
| 50+       | B            |
| 40+       | C            |
| 35+       | D            |
| 30+       | E            |
| -30       | F            |



Course evaluation and course development {#kursutvardering}
-----------------------------------------------------

At the end of the course you receive a link to the course evaluation in Canvas. The course evaluations are important for course development so please take 3-5 minutes to complete the course evaluation.



Course plan {#kursplan}
-----------------------------------------------------

The syllabus is the formal document of the course that has been established by the university. When the course is evaluated, it is done against the syllabus. In the syllabus you can read about the course's classification, purpose, content, goals, general abilities, learning and teaching, assessment and examination, literature, etc.

[Course plan for DV1466](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1466)

[Course plan for DV1563](http://edu.bth.se/utbildning/utb_kursplaner.asp?KKurskod=DV1563)
