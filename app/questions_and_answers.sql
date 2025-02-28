INSERT INTO "question" ("question", "xp", "category") VALUES
('World War I began in which year?', '25', 'History'),
('Adolf Hitler was born in which country?', '25', 'History'),
('John F. Kennedy was assassinated in:', '25', 'History'),
('Who fought in the war of 1812?', '75', 'History'),
('Which general famously stated "I shall return?"', '25', 'History'),
('The Magna Carta was published by the King of which country?', '25', 'History'),
('The first successful printing press was developed by this man.', '25', 'History'),
('The disease that ravaged and killed a third of Europe''s population in the 14th century is known as:', '75', 'History'),
('The Hundred Years War was fought between what two countries?', '25', 'History'),
('Which man wrote a document known as the 95 Theses?', '25', 'History'),
('What famous 5th century A.D conqueror was known as "The Scourge of God?"', '25', 'History'),
('What famous rifle is known in America as "The Gun that Won the West?"', '75', 'History'),
('Who wrote "To be, or not to be, that is the question"?', '25', 'Art'),
('According to Guinness world records, what is the best selling book of all time?', '25', 'Art'),
('What type of glass is used in movies and TV special effects to break, without harming the actors?', '25', 'Art'),
('Van Gogh''s "The Starry Night" illustrates the view from the window of which building', '75', 'Art'),
('Which composer had his heart buried in Poland and his body buried in France?', '75', 'Art'),
('Who is Stefani Joanne Angelina Germanotta?', '75', 'Art'),
('Which painter continued his work despite having crippling arthritis?', '75', 'Art'),
('La Giaconda is better known as what?', '25', 'Art'),
('Tom Hanks won two consecutive Oscars in 1994 and 1995. Which films were they for?', '75', 'Art'),
('Who played the lead role in the 2001 movie Lara Croft: Tomb Raider?', '25', 'Art'),
('Which singer has the most UK Number One singles ever?', '75', 'Art'),
('What was Britney Spears'' first single called?', '75', 'Art'),
('What is the highest mountain in the world?', '25', 'Geography'),
('How many islands belong to the Philippines?', '75', 'Geography'),
('Which one of these countries has more than one capital?', '25', 'Geography'),
('Where is the largest pyramid in the world?', '25', 'Geography'),
('How did the Marshall Islands get its name?', '75', 'Geography'),
('What''s the name of the second biggest waterfall in the world, located in South Africa?', '75', 'Geography'),
('In which city is located the statue "Christ the Redeemer"?', '25', 'Geography'),
('Which city is the capital of Australia?', '25', 'Geography'),
('What is the smallest state in the world?', '25', 'Geography'),
('Which Turkish city has the name of a cartoon character?', '75', 'Geography'),
('Which country did once have the name Rhodesia?', '75', 'Geography'),
('What is the largest state of the United States?', '75', 'Geography'),
('Which part of the body has the thinnest skin?', '25', 'Science'),
('which of these chemicals is often found in nail polish remover?', '25', 'Science'),
('Where in the human body is the pharynx?', '25', 'Science'),
('How many teeth does an adult human have?', '25', 'Science'),
('Which creature has the longest pregnancy?', '75', 'Science'),
('Which animal has more than one heart?', '25', 'Science'),
('Who was the first woman to win the Nobel Prize?', '75', 'Science'),
('Where is the smallest bone of the human body?', '25', 'Science'),
('What are phosphenes?', '75', 'Science'),
('Which plant, known as "the bearer of hope", survived the atomic bomb of Hiroshima in 1945?', '75', 'Science'),
('Which hormone causes cells to absorb glucose from the blood?', '25', 'Science'),
('Which marine animal is the only male creature that reproduces through the female''s ovulation?', '75', 'Science'),
('In which year did Maradona score a goal with his hand?', '75', 'Sports'),
('How many minutes is a rugby match?', '75', 'Sports'),
('In which country were the first Olympic Games held?', '25', 'Sports'),
('How many matches did Mohammed Ali lose in his career?', '75', 'Sports'),
('Which cyclist was also called "The Cannibal"?', '75', 'Sports'),
('In which country is the Interlagos F1-circuit?', '75', 'Sports'),
('What is the name of the Barcelona FC football stadium?', '25', 'Sports'),
('Which popular fitness method was invented by a German?', '75', 'Sports'),
('How many times has Michael Schumacher been a Formula 1 champion?', '75', 'Sports'),
('What is the national sport in Japan?', '25', 'Sports'),
('With which car did Fernando Alonso won his first tittle in Formula 1?', '75', 'Sports'),
('Which snooker player is nicknamed as "The Rocket"?', '25', 'Sports');

INSERT INTO "answer" ("answer", "correct", "question_id") VALUES
('1923', FALSE, 1),
('1938', FALSE, 1),
('1917', FALSE, 1),
('1914', TRUE, 1),
('France', FALSE, 2),
('Germany', FALSE, 2),
('Austria', TRUE, 2),
('Hungary', FALSE, 2),
('New York', FALSE, 3),
('Austin', FALSE, 3),
('Dallas', TRUE, 3),
('Miami', FALSE, 3),
('Andrew Jackson', TRUE, 4),
('Arthur Wellsley', FALSE, 4),
('Otto von Bismarck', FALSE, 4),
('Napoleon', FALSE, 4),
('Bull Halsey', FALSE, 5),
('George Patton', FALSE, 5),
('Douglas MacArthur', TRUE, 5),
('Omar Bradley', FALSE, 5),
('France', FALSE, 6),
('Austria', FALSE, 6),
('Italy', FALSE, 6),
('England', TRUE, 6),
('Johannes Gutenberg', TRUE, 7),
('Benjamin Franklin', FALSE, 7),
('Sir Isaac Newton', FALSE, 7),
('Martin Luther', FALSE, 7),
('The White Death', FALSE, 8),
('The Black Plague', FALSE, 8),
('Smallpox', FALSE, 8),
('The Bubonic Plague', TRUE, 8),
('Italy and Carthage', FALSE, 9),
('England and Germany', FALSE, 9),
('France and England', TRUE, 9),
('Spain and France', FALSE, 9),
('Martin Luther', TRUE, 10),
('Saint Augustus', FALSE, 10),
('Henry David Thoreau', FALSE, 10),
('Voltaire', FALSE, 10),
('Hannibal', FALSE, 11),
('Julius Caesar', FALSE, 11),
('William the Conqueror', FALSE, 11),
('Attila the Hun', TRUE, 11),
('Henry Repeating Rifle', FALSE, 12),
('Colt Peacemaker', FALSE, 12),
('Winchester Model 1873', TRUE, 12),
('Remington Army Revolver', FALSE, 12),
('Sylvia Plath', FALSE, 13),
('Virginia Woolf', FALSE, 13),
('John Steinbeck', FALSE, 13),
('William Shakespeare', TRUE, 13),
('The Three Musketeers', FALSE, 14),
('The Bible', TRUE, 14),
('Quotations from Chairman Mao Tse-tung', FALSE, 14),
('Quran', FALSE, 14),
('Barley glass', FALSE, 15),
('Sugar cup', TRUE, 15),
('Synthetic glass', FALSE, 15),
('Vinegar glass', FALSE, 15),
('Windmill', FALSE, 16),
('Hospital', FALSE, 16),
('Asylum', TRUE, 16),
('Hotel', FALSE, 16),
('Franz Liszt', FALSE, 17),
('Richard Wagner', FALSE, 17),
('Frédéric Chopin', TRUE, 17),
('Antonín Dvorak', FALSE, 17),
('Marilyn Monroe', FALSE, 18),
('Lady Gaga', TRUE, 18),
('Alicia Keys', FALSE, 18),
('Lana Del Rey', FALSE, 18),
('Pierre-Auguste Renoir', TRUE, 19),
('Pablo Picasso', FALSE, 19),
('Claude Monet', FALSE, 19),
('Miguel Ângelo', FALSE, 19),
('Meisje met de parel', FALSE, 20),
('Whistler''s Mother', FALSE, 20),
('The Princesse de Broglie', FALSE, 20),
('Mona Lisa', TRUE, 20),
('"Philadelphia" and "Forrest Gump"', TRUE, 21),
('"Philadelphia" and "Salving Private Ryan"', FALSE, 21),
('"Salving Private Ryan" and "Cast Away"', FALSE, 21),
('"Cast Away" and "Forrest Gump"', FALSE, 21),
('Charlize Theron', FALSE, 22),
('Nicole Kidman', FALSE, 22),
('Angelina Jolie', TRUE, 22),
('Cameron Diaz', FALSE, 22),
('The Beatles', FALSE, 23),
('Madonna', FALSE, 23),
('Elvis Presley', TRUE, 23),
('Ed Sheeran', FALSE, 23),
('Baby One More Time', TRUE, 24),
('Toxic', FALSE, 24),
('Lucky', FALSE, 24),
('Born to Make You Happy', FALSE, 24),
('K2', FALSE, 25),
('Mount Everest', TRUE, 25),
('Mount Fuji', FALSE, 25),
('Kilimanjaro', FALSE, 25),
('184', FALSE, 26),
('10363', FALSE, 26),
('5290', FALSE, 26),
('7641', TRUE, 26),
('South Africa', TRUE, 27),
('Slovenia', FALSE, 27),
('Vietnam', FALSE, 27),
('Curaçao', FALSE, 27),
('Egypt', FALSE, 28),
('Mexico', TRUE, 28),
('Guatemala', FALSE, 28),
('Turkey', FALSE, 28),
('Hosted the first US Marshall Service', FALSE, 29),
('In honor of a famous Marshall', FALSE, 29),
('Due to the outline of the islands in the form of a great star', FALSE, 29),
('Were named after British explorer John Marshall', TRUE, 29),
('Tugela falls', TRUE, 30),
('Browne falls', FALSE, 30),
('Yosemite falls', FALSE, 30),
('James Bruce falls', FALSE, 30),
('Salvador', FALSE, 31),
('Rio de Janeiro', TRUE, 31),
('Brasília', FALSE, 31),
('São Paulo', FALSE, 31),
('Sydney', FALSE, 32),
('Melbourne', FALSE, 32),
('Adelaide', FALSE, 32),
('Camberra', TRUE, 32),
('Vatican', TRUE, 33),
('Monaco', FALSE, 33),
('Nauru', FALSE, 33),
('Tuvalu', FALSE, 33),
('Green Lantern', FALSE, 34),
('Batman', TRUE, 34),
('Wolverine', FALSE, 34),
('Spiderman', FALSE, 34),
('Madagascar', FALSE, 35),
('Zimbabwe', TRUE, 35),
('Kenya', FALSE, 35),
('Rwanda', FALSE, 35),
('California', FALSE, 36),
('Texas', FALSE, 36),
('Alaska', TRUE, 36),
('Washington', FALSE, 36),
('Eyelids', TRUE, 37),
('Feet soles', FALSE, 37),
('Hands', FALSE, 37),
('Arms', FALSE, 37),
('Dichloromethane', FALSE, 38),
('Acetone', TRUE, 38),
('Formalin', FALSE, 38),
('Butanol', FALSE, 38),
('Throat', TRUE, 39),
('Intestine', FALSE, 39),
('Ear', FALSE, 39),
('Eye', FALSE, 39),
('28', FALSE, 40),
('32', TRUE, 40),
('38', FALSE, 40),
('40', FALSE, 40),
('Giraffe', FALSE, 41),
('Elephant', TRUE, 41),
('Bison', FALSE, 41),
('Camel', FALSE, 41),
('Jellyfish', FALSE, 42),
('Blue whale', FALSE, 42),
('Octopus', TRUE, 42),
('Hippopotamus', FALSE, 42),
('Marie Curie', TRUE, 43),
('Sigrid Undset', FALSE, 43),
('Lorne Schindler', FALSE, 43),
('Irene Hemmingway', FALSE, 43),
('Foot', FALSE, 44),
('Hand', FALSE, 44),
('Chest', FALSE, 44),
('Ear', TRUE, 44),
('Luminous spots that we see when rubbing our eyes closed', TRUE, 45),
('A lung disease', FALSE, 45),
('An additive to increase the carbonation of a drink', FALSE, 45),
('Small openings in the solar ring', FALSE, 45),
('Trema Orientalis', FALSE, 46),
('Carpobrotus Chilensis', FALSE, 46),
('Acer Buergerianum', FALSE, 46),
('Gingko Biloba', TRUE, 46),
('Oxytocin', FALSE, 47),
('Insulin', TRUE, 47),
('Adrenaline', FALSE, 47),
('Epinephrine', FALSE, 47),
('Octopus', FALSE, 48),
('Seahorse', TRUE, 48),
('Jellyfish', FALSE, 48),
('Hermit Crab', FALSE, 48),
('1986', TRUE, 49),
('1967', FALSE, 49),
('1978', FALSE, 49),
('1990', FALSE, 49),
('90', FALSE, 50),
('80', TRUE, 50),
('70', FALSE, 50),
('60', FALSE, 50),
('Greece', TRUE, 51),
('Italy', FALSE, 51),
('France', FALSE, 51),
('China', FALSE, 51),
('3', FALSE, 52),
('1', FALSE, 52),
('5', TRUE, 52),
('6', FALSE, 52),
('Lance Armstrong', FALSE, 53),
('Bernard Hinault', FALSE, 53),
('Fausto Coppi', FALSE, 53),
('Eddy Merckx', TRUE, 53),
('Italy', FALSE, 54),
('Belgium', FALSE, 54),
('Brazil', TRUE, 54),
('Germany', FALSE, 54),
('Santiago Barnabéu', FALSE, 55),
('La Cartuja', FALSE, 55),
('RCDE Stadium', FALSE, 55),
('Camp Nou', TRUE, 55),
('Yoga', FALSE, 56),
('Pilates', TRUE, 56),
('Crossfit', FALSE, 56),
('Parkour', FALSE, 56),
('9', FALSE, 57),
('10', FALSE, 57),
('7', TRUE, 57),
('5', FALSE, 57),
('Judo', FALSE, 58),
('Sumo Wrestling', TRUE, 58),
('Karate', FALSE, 58),
('Akido', FALSE, 58),
('Ferrrari', FALSE, 59),
('HRT (Hispania Racing Team)', FALSE, 59),
('Renault', TRUE, 59),
('Lotus', FALSE, 59),
('Mark Selby', FALSE, 60),
('Ronnie O''Sullivan', TRUE, 60),
('Judd Trump', FALSE, 60),
('Neil Robertson', FALSE, 60);


-- Insert 4 quizzes with titles and descriptions
INSERT INTO quiz (id, title, description) VALUES
  (1, 'General Knowledge Trivia Vol. 1', 'A collection of 15 questions covering History, Art, Geography, Science, and Sports.'),
  (2, 'General Knowledge Trivia Vol. 2', 'A round of 15 questions spanning five categories.'),
  (3, 'General Knowledge Trivia Vol. 3', 'Test your expertise with 15 new questions from diverse fields.'),
  (4, 'General Knowledge Trivia Vol. 4', 'A set of 15 questions to challenge your knowledge.');

-- Quiz 1: Questions 1–3 (History), 13–15 (Art), 25–27 (Geography), 37–39 (Science), 49–51 (Sports)
INSERT INTO quiz_question (quiz_id, question_id)
VALUES
  (1, 1), (1, 2), (1, 3),
  (1, 13), (1, 14), (1, 15),
  (1, 25), (1, 26), (1, 27),
  (1, 37), (1, 38), (1, 39),
  (1, 49), (1, 50), (1, 51);

-- Quiz 2: Questions 4–6 (History), 16–18 (Art), 28–30 (Geography), 40–42 (Science), 52–54 (Sports)
INSERT INTO quiz_question (quiz_id, question_id)
VALUES
  (2, 4), (2, 5), (2, 6),
  (2, 16), (2, 17), (2, 18),
  (2, 28), (2, 29), (2, 30),
  (2, 40), (2, 41), (2, 42),
  (2, 52), (2, 53), (2, 54);

-- Quiz 3: Questions 7–9 (History), 19–21 (Art), 31–33 (Geography), 43–45 (Science), 55–57 (Sports)
INSERT INTO quiz_question (quiz_id, question_id)
VALUES
  (3, 7), (3, 8), (3, 9),
  (3, 19), (3, 20), (3, 21),
  (3, 31), (3, 32), (3, 33),
  (3, 43), (3, 44), (3, 45),
  (3, 55), (3, 56), (3, 57);

-- Quiz 4: Questions 10–12 (History), 22–24 (Art), 34–36 (Geography), 46–48 (Science), 58–60 (Sports)
INSERT INTO quiz_question (quiz_id, question_id)
VALUES
  (4, 10), (4, 11), (4, 12),
  (4, 22), (4, 23), (4, 24),
  (4, 34), (4, 35), (4, 36),
  (4, 46), (4, 47), (4, 48),
  (4, 58), (4, 59), (4, 60);