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
			if($post['title'] == '' || $post['body'] == '' || $post['link'] == '')
			{
				Messages::setMsg('Please Fill all fields','error');
				return;
			}
			// Insert To MySQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title',$post['title']);
			$this->bind(':body',$post['body']);
			$this->bind(':link',$post['link']);
			$this->bind(':user_id',$_SESSION['user']['id']);
			$this->execute();

			//verify
			if($this->lastInsertId())
			{
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}
			else
			{
				Messages::setMsg('Please Check you meet our criteria','error');
			}
		}
		return;
	}
}