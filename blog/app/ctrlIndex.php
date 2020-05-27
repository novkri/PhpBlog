<?php

class ctrlIndex extends ctrl {


	function index() {
		$this->posts = $this->db->query("SELECT * FROM post ORDER BY ctime DESC")->all();
		$this->out('posts.php');
		
	}
	
	function users() {
		
		$this->users = $this->db->query("SELECT * FROM users")->all();
		$this->out('users.php');
	}

	// function login() {
	// 	if (!empty($_POST)) {
	// 		$user = $this->db->query("SELECT * FROM admin WHERE email = ? AND pass = ?",$_POST['mail'],md5($_POST['pass']))->assoc();
	// 		if ($user) {
	// 			$_key = md5(microtime().rand(0,10000));
 //                $_time = time()+86400*30;
	// 			setcookie('uid', $user['id'], $_time);
	// 			setcookie('key', $_key, $_time);
	// 			$this->db->query("UPDATE admin SET cookie = ? WHERE id = ?",$_key,$user['id']);
	// 			header("Location: /");
	// 		} else
	// 			$this->error = 'Неправильный емейл или пароль';
	// 	}
	// 	$this->out('login.php');
	// }

    function logout() {
        setcookie('uid','',0);
        setcookie('key','',0);
        $this->user = false;
        header("Location: /");
    }


    function loginUser() {
		if (!empty($_POST)) {
			$user = $this->db->query("SELECT * FROM users WHERE email = ? AND pass = ?",$_POST['mail'],($_POST['pass']))->assoc();
			if ($user) {
				$_key = md5(microtime().rand(0,10000));
                $_time = time()+86400*30;
				setcookie('uid', $user['id'], $_time);
				setcookie('key', $_key, $_time);
				$this->db->query("UPDATE users SET cookie = ? WHERE id = ?",$_key,$user['id']);
				header("Location: /");
			} else
				$this->error = 'Неправильный емейл или пароль';
		}
		$this->out('loginUser.php');
	}

	function signup() {
			if (!empty($_POST)) {
				$this->db->query("INSERT INTO users(email,pass) VALUES(?,?)",htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['pass']));
				header("Location: /");
			}
			$this->out('signup.php');
		}


	function add() {
		if (!$this->user) return header("Location: /");
		if (!empty($_POST)) {
			$this->db->query("INSERT INTO post(title,post,ctime) VALUES(?,?,?)",htmlspecialchars($_POST['title']), $_POST['post'],time());
			header("Location: /");
		}
		$this->out('add.php');

	}

    function edit($id) {
		if (!$this->user) return header("Location: /");

		if (!empty($_POST)) {
			$this->db->query("UPDATE post SET title=?, post=? WHERE id=?",htmlspecialchars($_POST['title']), $_POST['post'], $id);
            print_r($res);
			header("Location: /");
		}
        else {
            $this->post = $this->db->query("SELECT * FROM post WHERE id = ?",$id)->assoc();
            $this->out('add.php');
        }
	}

	

	function del($id) {
		if (!$this->user) return header("Location: /");
		$this->db->query("DELETE FROM post WHERE id = ?",$id);
		header("Location: /");
	}


    function post($id) {
        $this->post = $this->db->query("SELECT * FROM post WHERE id = ?",$id)->assoc();
        $this->out('post.php');
    }


    function delUser($id) {
		if (!$this->user) return header("Location: /");
		$this->db->query("DELETE FROM users WHERE id = ?",$id);
		header("Location: /?users/");
	}

	function addUser() {
		if (!$this->user) return header("Location: /");
		if (!empty($_POST)) {
			$this->db->query("INSERT INTO users(email,pass) VALUES(?,?)",htmlspecialchars($_POST['email']), htmlspecialchars($_POST['pass']));
			header("Location: /?users/");
		}
		$this->out('addUser.php');

	}

	function editUser($id) {
		if (!$this->user) return header("Location: /");

		if (!empty($_POST)) {
			$this->db->query("UPDATE users SET email=?, pass=? WHERE id=?",htmlspecialchars($_POST['email']), $_POST['pass'], $id);
            print_r($res);
			header("Location: /?users/");
		}
        else {
            $this->users = $this->db->query("SELECT * FROM users WHERE id = ?",$id)->assoc();
            $this->out('addUser.php');
        }
	}
}

