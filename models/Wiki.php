<?php

class wiki
{
    public function __construct()
    {
        
    }
    
    // public function getRoomById($id)
    // {
    //     global $db;
    //     $stmt = $db->prepare("SELECT * FROM rooms WHERE id_room =?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $room = $result->fetch_assoc();
    //     return $room;
    // }

    // public function quitterRoom($roomId, $myId)
    // {
    //     global $db;
    //     $stmt = $db->prepare("DELETE FROM room WHERE id_r = '$roomId' AND id_u = '$myId'");
    //     return $stmt->execute();
    // }








    // add tags

    public function addTag($name)
    {
        global $db;
        $stmt = $db->prepare("INSERT INTO tags (name) VALUES (?)");
        $stmt->bind_param("s", $name); 
        $result = $stmt->execute();
        return $result;
    }

    public function editTag($tagId, $name)
    {
        global $db;
        $stmt = $db->prepare("UPDATE tags SET name = '$name' WHERE id_tag = '$tagId'");
        $result = $stmt->execute();
        return $result;
    }

    public function getAllTags()
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM tags");
        $stmt->execute();

        $result = $stmt->get_result();
        $tags = $result->fetch_all(MYSQLI_ASSOC);
        return $tags;
    }

    public function deleteTag($tagId)
    {
        global $db;
        $stmt = $db->prepare("DELETE FROM tags  WHERE id_tag='$tagId'");
        $results = $stmt->execute();
        return $results;
    }




    // end add tags



    // add category

    // end add category

}