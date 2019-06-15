<?php 
class ShareModel extends Model
{
	public function index()
	{
		$this->query('SELECT * FROM shares ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add($post)
	{
		if($post['submit'])
		{
			// Insert To MySQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title',$post['title']);
			$this->bind(':body',$post['body']);
			$this->bind(':link',$post['link']);
			$this->bind(':user_id',1);
			$this->execute();

			//verify
			if($this->lastInsertId())
			{
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}
		}
		return;
	}
}