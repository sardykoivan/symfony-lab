explain select * from library_authors a
join library_books b on b.author_id = a.id;

explain analyze select * from library_authors a
join library_books b on b.author_id = a.id
where a.id = '024dc04b-3dd2-4ba6-8ed6-15bcacb74e6c';

explain analyze select * from library_authors a
where a.id = '024dc04b-3dd2-4ba6-8ed6-15bcacb74e6c';

explain select * from library_authors a
where a.full_name = 'Pushkin';

select ctid, * from library_authors a;

vacuum full;

select
    1 as id,
    'vasya' as name
union
select
1, 'vasya'
union
select
2, 'petya';
