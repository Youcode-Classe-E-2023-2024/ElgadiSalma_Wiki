<?php

class Room
{
    public function __construct()
    {
        
    }
    
    public function addRoom($title, $created_by, $selectedUsers)
    {
        global $db;

        $db->begin_transaction();

        $stmt1 = $db->prepare("INSERT INTO rooms (title, created_by) VALUES (?, ?)");
        $stmt1->bind_param("si", $title, $created_by);

        if (!$stmt1->execute()) {
            $db->rollback();
            return false;
        }

        $roomId = $db->insert_id;

        $stmt1->close();

        foreach ($selectedUsers as $userId) {
            $stmt2 = $db->prepare("INSERT INTO room (id_r, id_u) VALUES (?, ?)");
            $stmt2->bind_param("ii", $roomId, $userId);

            if (!$stmt2->execute()) {
                $db->rollback();
                return false;
            }

            $stmt2->close();
        }

        $db->commit();
        return true;
    }

    public function getRooms($myId)
    {
        global $db;
        $stmt = $db->prepare("SELECT rooms.*, COUNT(room.id_u) AS member_count
                                FROM rooms
                                LEFT JOIN room ON rooms.id_room = room.id_r
                                WHERE id_room IN (SELECT id_r FROM room WHERE id_u = ?)
                                GROUP BY rooms.id_room");
        $stmt->bind_param("i", $myId);
        $stmt->execute();
        $result = $stmt->get_result();
        $rooms = $result->fetch_all(MYSQLI_ASSOC);
        return $rooms;
    }

    public function getRoomById($id)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM rooms WHERE id_room =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $room = $result->fetch_assoc();
        return $room;
    }

    public function sendMessage($myId, $id, $message)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO message (id_user, id_room, text) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $myId, $id, $message);
    return $stmt->execute();
    
}

    public function getMessages($id)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM message WHERE id_room=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $messages = $result->fetch_all(MYSQLI_ASSOC);
        return $messages;
    }

    public function quitterRoom($roomId, $myId)
    {
        global $db;
        $stmt = $db->prepare("DELETE FROM room WHERE id_r = '$roomId' AND id_u = '$myId'");
        return $stmt->execute();
    }


}