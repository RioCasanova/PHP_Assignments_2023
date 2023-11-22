# Lab 03: 

This Lab is worth 10% of your overall grade.

Please see Moodle for submission details and the final due date.

---

## Querying the Pokédex

Pokémon refers to the fictional creatures (like animals) that inhabit the Pokémon world. Each Pokémon has unique abilities, characteristics, and types. In this universe, the Pokédex works as a comprehensive database that records information about each Pokémon species.


## Setting up the Table

You have been given a partial Pokédex with a total of 928 entries in `init.sql`. 

Study the name of each column, what data type each column should be, the maximum length of each column, and whether or not the column can be a `NULL` value. Keep in mind that you will also need a `PRIMARY KEY` for this table.

When you are ready, finish the `CREATE TABLE` statement and run it in PHPMyAdmin. Make sure that you save this statement in the `init.sql`, as you will be graded on how you set up this table.

After your table is created, you will be able to run the second part of the script, which will add all of the records you need to complete this Lab.


## Your Task

After your table is created and all of the records are loaded in, you will create a PHP document that answers the following questions by performing SQL queries, retrieving and extracting the data, and displaying it to the user. 

Remember that when you present your answer, it must be properly formatted, easily legible, and make sense to the user. Your answers should either be in the context of a complete sentence, a list, or an HTML table with headings. 


### Questions

1. What is the total number of Pokémon currently in the Pokédex?

2. Which Pokémon has the highest Attack stat amongst Legendary Pokémon? Which one has the highest Attack stat amongst non-Legendary Pokémon?

    Hint: Do this with two queries.

3. How many Pokémon are exclusively "Fire" types?
    
4. What are the names and attack stats of all the Legendary Pokémon in Generation 7?
    
5. What is the average defense stat of all the Pokémon?

6. What are the names and types of all of the non-Legendary Pokémon with a speed greater than 120?
    
7. What are all of the "Water" type Pokémon, starting with the ones with the highest HP (Hit Points)?
    
8. What is the total number of Pokémon in each generation?

9. What are the names of Pokémon that have both "Ghost" and "Fairy" as their types?

10. What is the average HP, attack, and defense stats of the Pokémon belonging to the "Grass" type?

11. Insert a new Pokémon into the Pokédex with the following details: 
        
        Name: Sprigatito
        Type: Grass
        HP: 40
        Attack: 61
        Defense: 54
        Speed: 65
        Sp. Atk: 45
        Sp. Def: 45
        Generation: 9
        Legendary: No

    Retrieve the record for Sprigatito and display it to the user.

12. Increment Sprigatito speed stat by 10 and display the updated entry to the user.

13. Delete Sprigatito from the Pokédex and try to display it to the user.

---

## Hints

If you are unfamiliar with the Pokémon franchise and the terminology used in this table, do not fret! This section will go a little deeper into explaining each column.


### Types

Pokémon can have either one or two different types. All of the types are as follows:

1. Normal
2. Fire
3. Water
4. Electric
5. Grass
6. Ice
7. Fighting
8. Poison
9. Ground
10. Flying
11. Psychic
12. Bug
13. Rock
14. Ghost
15. Dragon
16. Dark
17. Steel
18. Fairy

If a Pokémon has only one type, then its second type will be `NULL`.


### Battle Stats

One of the main features of Pokémon is Pokémon battles. In Pokémon battles, there are several key battle stats that determine a Pokémon's strengths and weaknesses. Here's an explanation of each battle stat:

1. HP (Hit Points): HP represents a Pokémon's health or stamina. It determines how much damage a Pokémon can withstand before fainting. When HP reaches zero, the Pokémon faints and is unable to battle.

2. Attack: Attack represents a Pokémon's physical strength. It affects the power of the Pokémon's physical moves, such as Tackle or Scratch. Pokémon with high Attack stats deal more damage with physical moves.

3. Defense: Defense represents a Pokémon's ability to withstand physical attacks. It reduces the damage taken from the opponent's physical moves. Pokémon with high Defense stats can endure physical attacks better.

4. Speed: Speed represents a Pokémon's quickness or agility. It determines which Pokémon moves first in battle. Pokémon with higher Speed stats are more likely to attack first.

5. Special Attack (Sp. Atk): Special Attack represents a Pokémon's power in special or elemental moves, such as Flamethrower or Thunderbolt. It affects the damage dealt by those moves. Pokémon with high Special Attack stats are stronger in special moves.

6. Special Defense (Sp. Def): Special Defense represents a Pokémon's ability to withstand special attacks. It reduces the damage taken from the opponent's special moves. Pokémon with high Special Defense stats can withstand special attacks better. 


### Generation

In Pokémon, a 'Generation' refers to a specific set of Pokémon that was first introduced in a mainline game. A mainline Pokémon game is usually released every 3-4 years, introducing a new region and new Pokémon each time.

Generation 1: Pokémon introduced in 1996 (Games: Red, Blue, Green, Yellow)
Generation 2: Pokémon introduced in 1999 (Games: Gold, Silver, Crystal)
Generation 3: Pokémon introduced in 2002 (Games: Ruby, Sapphire, Emerald)
Generation 4: Pokémon introduced in 2006 (Games: Diamond, Pearl, Platinum)
Generation 5: Pokémon introduced in 2010 (Games: Black, White)
Generation 6: Pokémon introduced in 2013 (Games: X, Y)
Generation 7: Pokémon introduced in 2016 (Games: Sun, Moon)
Generation 8: Pokémon introduced in 2019 (Games: Sword, Shield)
Generation 9: Pokémon introduced in 2022 (Games: Scarlet, Violet)