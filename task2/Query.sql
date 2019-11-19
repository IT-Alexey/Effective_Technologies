SELECT

    authors.id,

    AUTHORS.fullname,

    IFNULL(productivity.book_count, 0) as cnt

FROM AUTHORS

    LEFT JOIN

        (select

            authorship.author_id,

            COUNT(authorship.book_id) as book_count

        FROM

            authorship

        GROUP BY

            authorship.author_id

        ) AS productivity

        ON

            AUTHORS.id = productivity.author_id

WHERE

    IFNULL(productivity.book_count, 0) <= 6