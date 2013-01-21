set autocommit=0;

	use cd4you;
   ----------------------------------posts update--------------------------------------
	-- 走进四幼 内容更新
	update posts set post_category='301' where post_category = '3020101';
	update posts set post_category='302' where post_category = '3020102';
	update posts set post_category='303' where post_category = '3020104';
	update posts set post_category='306' where post_category = '3020103';
	update posts set post_category='308' where post_category = '3020105';

	-- 新闻播报 最新消息 用原 园内新闻 内容更新
	update posts set post_category='401' where post_category = '3020802';
	
	-- 校园公告  温馨提示 用原 通知公告 内容更新
	update posts set post_category='501' where post_category = '3020801';
	
	-- 早教中心 内容更新	
	update posts set post_category='1001' where post_category = '3020601';
	update posts set post_category='1002' where post_category = '3020603';
	update posts set post_category='1003' where post_category = '3020604';

		-- 营养监控 内容更新	 
	update posts set post_category='1401' where post_category = '3020501';
	update posts set post_category='1402' where post_category = '3020503';
	
	----------------------------------posts_modules update--------------------------------------		
	update posts_modules set module_id='301' where module_id = '3020101';
	update posts_modules set module_id='302' where module_id = '3020102';
	update posts_modules set module_id='303' where module_id = '3020104';
	update posts_modules set module_id='306' where module_id = '3020103';
	update posts_modules set module_id='308' where module_id = '3020105';
	update posts_modules set module_id='401' where module_id = '3020802';
	update posts_modules set module_id='501' where module_id = '3020801';
	update posts_modules set module_id='1001' where module_id = '3020601';
	update posts_modules set module_id='1002' where module_id = '3020603';
	update posts_modules set module_id='1003' where module_id = '3020604';
	update posts_modules set module_id='1401' where module_id = '3020501';
	update posts_modules set module_id='1402' where module_id = '3020503';
	

	-- ---------------------------将老网站posts迁移到新网站DB---------------------------------------
	insert into cds4you.posts(comment_count,comment_status,menu_order,ping_status,pinged,post_author,post_content,post_content_filtered,post_date,post_date_gmt,post_excerpt,post_mime_type,post_modified,post_modified_gmt,post_name,post_parent,post_password,post_status,post_title,post_type,to_ping) select comment_count,comment_status,menu_order,ping_status,pinged,post_author,post_content,post_content_filtered,post_date,post_date_gmt,post_excerpt,post_mime_type,post_modified,post_modified_gmt,post_name,post_parent,post_password,post_status,post_title,post_type,to_ping from cd4you.posts;

	--------------------------------将老网站posts_modules迁移到新网站DB---------------------------
	insert into cds4you.posts_modules(post_id,module_id) select post_id,module_id from cd4you.posts_modules;

	-----------------------------------新网站post_metas 插入对应数据----------------------------------
	insert into cds4you.post_metas(id,category) select a.post_id,a.module_id from cds4you.posts_modules a,cds4you.modules b where a.module_id = b.id;
	
commit;