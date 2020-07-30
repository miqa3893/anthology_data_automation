select users.twitter_id,users.twitter_name,works.work_title,works.comment from users inner join works on users.twitter_id = works.twitter_id order by works.created_at desc
