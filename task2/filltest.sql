INSERT
    INTO
        AUTHORS (fullname)
    VALUES
        ('Lennon, John'),
        ('Holms, Sherlock'),
        ('Watson, Doctor'),
        ('Dow, John')
;
INSERT
    INTO
        books (title)
    VALUES
        ('Eleanore Rigbey'),
        ('The Red Hat'), 
        ('The Immortal'),
        ('Winnie-the-Pooh et al.'),
        ('Tit-tat-toe, my first go'),
        ('Yellow kings'),
        ('Adventures of Robinson'),
        ('Lecture Notes in Applied Algebra'),
        ('Potatoes'),
        ('The Last of the Mohicans'),
        ('Black and White')
;
INSERT
    INTO
        authorship(book_id, author_id)
    VALUES
        (2, 4),
        (3, 4),
        (4, 4),
        (5, 4),
        (6, 4),
        (8, 4);
INSERT
    INTO
        authorship(book_id, author_id)
    VALUES
        (1, 1)
;
INSERT
    INTO
        authorship(book_id, author_id)
    VALUES
        (2, 2),
        (3, 2),
        (4, 2),
        (5, 2),
        (6, 2),
        (7, 2),
        (8, 2),
        (10, 2),
        (11, 2)
;
