<?php
    class contact extends controler{
        public $doituong;
    
        public function __construct()
        {
            $this->doituong = $this->model("contactModel");
        }
    
        public function home(){
            $this->view("home_index",["page"=>"contact_view",
            "listRooms"=>$this->doituong->getListRoom()
            ]);
            
        }

        public function sendMess(){
            if(isset($_POST["btnSendMess"])){
                $HoTen = $_POST["txtName"];
                $Email = $_POST["txtEmail"];
                $SDT = $_POST["txtPhoneNum"];
                $NoiDung = $_POST["txaContent"];
                $MaTN = date("d-m-Y").'('.date("H:i:s").')';
                $result = $this->doituong->sendMessage($MaTN, $HoTen, $SDT, $Email, $NoiDung);

                $this->view("home_index",["page"=>"contact_view",
                "result"=>$result,
                "listRooms"=>$this->doituong->getListRoom()
                ]);
            }
        }
    }
?>