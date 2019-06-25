<?php 
class UserModel extends Model
{
	public function register($post)
	{
		if($post['submit'])
		{
			// Insert To MySQL
			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name',$post['name']);
			$this->bind(':email',$post['email']);
			$this->bind(':password',md5($post['password']));
			$this->execute();

			//verify
			if($this->lastInsertId())
			{
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login($post)
	{
		if($post['submit'])
		{
			// Insert To MySQL
			$this->query('SELECT * FROM users WHERE email=:email AND password=:password');
			$this->bind(':email',$post['email']);
			$this->bind(':password',md5($post['password']));
			$this->execute();
			$row = $this->single();
			if($row)
			{
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user'] = array(
					'id' => $row['id'],
					'name' => $row['name'],
					'email' => $row['email']
				);
				header('Location: '.ROOT_URL.'shares');
			}
			// //verify
			// if($this->lastInsertId())
			// {
			// }
		}
		return;
	}

}