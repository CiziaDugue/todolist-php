USE todolist;

INSERT INTO users(firstName, lastName, mail, password) VALUES ('Cerise', 'Andres', 'ceriseandres@yahoo.fr', '123456'), ('Cizia', 'Dugué', 'ciziadugue@yahoo.fr', '123456'), ('User1', 'User1', 'user1@yahoo.fr', '123456'), ('User2', 'User2', 'user2@yahoo.fr', '123456'), ('User3', 'User3', 'user3@yahoo.fr', '123456');

INSERT INTO state(label) VALUES ('A faire'), ('En cours'), ('Achevé'), ('Archivé'), ('Annulé');

INSERT INTO toDoLists(label) VALUES ('todolist1'), ('todolist2'), ('todolist3'), ('todolist4');

INSERT INTO users_toDoLists(user_id, toDoList_id) VALUES (1, 1), (1, 2), (2, 2), (2, 3);

INSERT INTO toDoActions(label, description, todoList_id, state_id, user_id) VALUES ('task1', 'task1', 1, 1, 1), ('task2', 'task2', 1, 1, 1), ('task3', 'task3', 2, 2, 1), ('task4', 'task4', 2, 3, 2), ('task5', 'task5', 3, 4, 3);

INSERT INTO comments(task_id, user_id, text) VALUES (1, 1, 'Lorem ipsum dolor sit sce nec purus lacinia, elementum orci a, consequat nisl. Curabitur blandit ligula vitae sapien dignissim aliquam.'), (2, 2, 'Nam pellentesque mattis nunc ac aliquet. Ut maximus ligula quam. In tempor augue eu enim luctus ulestas imperdiet.');