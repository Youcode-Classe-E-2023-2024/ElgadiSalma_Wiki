<?php
include_once '_config/Database.php';
class Wiki
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // CRUD wiki
    public function addWiki($myId, $title, $description, $category, $selectedTags, $photo) {
        $this->db->beginTransaction();

        $this->db->query("INSERT INTO wikis (title, description, photo, category, created_by) VALUES (:title, :description, :photo, :category, :created_by)");
        $this->db->bind(':title', $title);
        $this->db->bind(':description', $description);
        $this->db->bind(':photo', $photo);
        $this->db->bind(':category', $category);
        $this->db->bind(':created_by', $myId);

        if (!$this->db->execute()) {
            $this->db->cancelTransaction();
            return false;
        }

        $wikiId = $this->db->lastInsertId();

        foreach ($selectedTags as $tagId) {
            $this->db->query("INSERT INTO tag_wiki (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
            $this->db->bind(':id_wiki', $wikiId);
            $this->db->bind(':id_tag', $tagId);

            if (!$this->db->execute()) {
                $this->db->cancelTransaction();
                return false;
            }
        }

        $this->db->endTransaction();
        return true;
    }   
    
    public function getMyWikis($myId)
    {
        $this->db->query("SELECT * FROM wikis WHERE created_by = '$myId'");
        $wikis = $this->db->resultSet();
        return $wikis; 
    }
    
    // end CRUD wiki

    // Add Tags
    public function addTag($name) 
    {
        $this->db->query("INSERT INTO tags (name) VALUES (?)");
        $this->db->bind(1, $name, PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function editTag($tagId, $name) 
    {
        $this->db->query("UPDATE tags SET name = ? WHERE id_tag = ?");
        $this->db->bind(1, $name, PDO::PARAM_STR);
        $this->db->bind(2, $tagId, PDO::PARAM_INT);

        return $this->db->execute();
    }


    public function getAllTags()
    {
        $this->db->query("SELECT * FROM tags");
        $tags = $this->db->resultSet();
        return $tags;
    }

    public function deleteTag($tagId) 
    {
        $this->db->query("DELETE FROM tags WHERE id_tag = ?");
        $this->db->bind(1, $tagId, PDO::PARAM_INT);

        return $this->db->execute();
    }
    // end add tag


    // Add Category
    public function addCategory($name) 
    {
        $this->db->query("INSERT INTO category (name) VALUES (?)");
        $this->db->bind(1, $name, PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function editCategory($categoryId, $name) 
    {
        $this->db->query("UPDATE category SET name = ?, updated_at = NOW() WHERE id_category = ?");
        $this->db->bind(1, $name, PDO::PARAM_STR);
        $this->db->bind(2, $categoryId, PDO::PARAM_INT);

        return $this->db->execute();
    }


    public function getAllCategories()
    {
        $this->db->query("SELECT * FROM category ORDER BY updated_at DESC");
        

        $categories = $this->db->resultSet();
        return $categories;
    }

    public function deleteCategory($categoryId) 
    {
        $this->db->query("DELETE FROM category WHERE id_category = ?");
        $this->db->bind(1, $categoryId, PDO::PARAM_INT);

        return $this->db->execute();
    }

    // end add category

}
