<?php
    class room extends controler{
        public $doituong;
    
        public function __construct()
        {
            $this->doituong = $this->model("roomModel");
        }
    
        public function home(){
            $this->view("home_index",["page"=>"room_view",
            "listRooms"=> $this->doituong->getListRoom(),
            "listRoomsLine1"=> $this->doituong->getListRoomLine1(),
            "listRoomsLine2"=> $this->doituong->getListRoomLine2(),
            "listRoomsLine3"=> $this->doituong->getListRoomLine3()
            ]);
            
        }
    }
?>