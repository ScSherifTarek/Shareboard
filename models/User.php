<?php 
class UserModel extends Model
{
	public function register($post)
	{
		if($post['submit'])
		{
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == '')
			{
				Messages::setMsg('Please Fill all fields','error');
				return;		
			}
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
			else
			{
				Messages::setMsg('Maybe we have an account with this email','error');
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
			else
			{
				Messages::setMsg('Wrong credintals', 'error');
			}
		}
		return;
	}

}