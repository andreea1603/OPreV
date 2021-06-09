<?php

$request=file_get_contents("php://input");
$object=json_decode($request,true);

if(isset($object))
    if($object["metoda"]=="add")//add
        addEvent($object);
    else
        if($object["metoda"]=="delete"){//delete
            deleteEvent($object);
        }
        else
            if($object["metoda"]=="edit")//edit
                updateEvent($object);

class Event{
    public $id;
    public $imagePath;
    public $titluEvent;
    public $descriereEvent;
}
function deleteEvent($object){
    include('db-connectEvents.php');
    $id=$object["id"];
    $query = "Delete from evenimente where id='{$id}'";
    $result=mysqli_query($connEvents,$query);
}
function addEvent($object){
    include('db-connectEvents.php');
    $image=$object["image"];
    $titlu=$object["titlu"];
    $descriere=$object["descriere"];
    $query = "Insert into evenimente (imagePath,titluEvent,descriereEvent) values ('{$image}','{$titlu}' , '{$descriere}')";
    $result=mysqli_query($connEvents,$query);
}
function updateEvent($object){
    include('db-connectEvents.php');
    $id=$object["id"];
    $titlu=$object["titlu"];
    $descriere=$object["descriere"];
    
    $query = "Update evenimente set titluEvent='{$titlu}' , descriereEvent='{$descriere}' where id='{$id}'";
    $result=mysqli_query($connEvents,$query);
}
function getEvents(){
    include('db-connectEvents.php');
    $event=new Event();
    $query='Select * from evenimente';
    $result = mysqli_query($connEvents, $query);
    $events=array();
    while ($row = $result->fetch_assoc()) {
        $event=new Event();
        $event->id=$row['id'];
        $event->imagePath=$row['imagePath'];
        $event->titluEvent=$row['titluEvent'];
        $event->descriereEvent=$row['descriereEvent'];
        array_push($events,$event);
    }
    return $events;
}
?>