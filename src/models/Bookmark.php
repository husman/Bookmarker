<?php

include_once "db/Database.php";


class Bookmark {
    public $id;
    public $title;
    public $url;
    public $user;
    public $created_date;

    function __construct($argments=NULL) {
        if($argments != NULL)
            foreach($argments as $column => $values)
                $this->{$column} = $values;

        $this->db = Database::getHandle();
    }

    function __destruct() {
        $this->db = NULL;
    }

    public static function get($arguments=NULL) {
        $db = Database::getHandle();
        $base_sql = "
            SELECT
            B.id,
            B.title,
            B.url,
            B.created_date,
            U.id as __user__id,
            U.firstname as __user__firstname,
            U.lastname as __user__lastname,
            U.email as __user__email,
            U.password as __user__password
            FROM bookmarks B JOIN users U ON B.user_id = U.id ";

        if($arguments == NULL) {
            $statement = $db->prepare($base_sql . " WHERE U.id = ". $arguments['user']->id);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Bookmark');
            return $statement->fetchAll();
        }

        if(!is_array($arguments)) {
            $statement = $db->prepare($base_sql . " WHERE B.id = :id");
            $statement->execute(array(
                ':id' => $arguments
            ));
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Bookmark');
            return $statement->fetch();
        }

        $sql = $base_sql . " WHERE U.id = ". $arguments['user']->id;
        $where_clause = [];
        foreach($arguments as $column => $value) {
            if($column != 'user') {
                $where_clause[] = " AND B.{$column} = :{$column} ";
                $arguments[ ':' . $column ] = $value;
            }
            unset($arguments[$column]);
        }
        $sql .= implode(' ', $where_clause);

        $statement = $db->prepare($sql);
        $statement->execute($arguments);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Bookmark');
        return $statement->fetchAll();
    }

    public function save() {
        if($this->user == NULL || $this->user->id == NULL)
            throw new Exception('A user is required.');

        $sql = "UPDATE bookmarks SET title = :title, url = :url, user_id = :user_id";
        if($this->id == NULL)
            $sql = "INSERT INTO bookmarks (title, url, user_id) VALUES (:title, :url, :user_id)";

        $statement = $this->db->prepare($sql);
        $statement->execute(array(
            ':title' => $this->title,
            ':url' => $this->url,
            ':user_id' => $this->user->id,
        ));

        $new_bookmark = $this->get($this->db->lastInsertId());
        $this->id = $new_bookmark->id;
        $this->created_date = $new_bookmark->created_date;
    }

    public function delete() {
        if($this->id == NULL)
            return;

        $statement = $this->db->prepare("DELETE FROM bookmarks WHERE id = :id");
        $statement->execute(array(
            ':id' => $this->id
        ));
    }

    public function __set($property, $value) {
        // if the property being set is on the user
        // object then proxy it to the Uuser object
        if(strpos($property, '__user__') > -1) {
            $property = str_replace('__user__', '', $property);

            if($this->user == NULL)
                $this->user = new User();

            $this->user->{$property} = $value;
        }
    }

    private $db;
    private $statement;
}