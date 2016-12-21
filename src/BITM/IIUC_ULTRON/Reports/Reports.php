<?php
namespace App\Reports;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class Reports extends DB{
    public $id="";
    public $title="";
    public $author="";
	public $category="";
	public $image_1="";
	public $image_2="";
	public $image_3="";
	public $video="";
	public $area="";
	public $ward_no="";
	public $description="";
	public $admin_feedback="";
	public $is_fixed="";
	public $del_id="";
    public $latitude = "";
    public $longitude = "";

    public function __construct(){
    parent:: __construct();
    if(!isset( $_SESSION)) session_start();
}

    public function setData($data=NULL){

        if(array_key_exists('id',$data)){
            $this->id = $data['id'];
        }

        if(array_key_exists('title',$data)){
            $this->title = $data['title'];
        }
		 if(array_key_exists('author',$data)){
            $this->author = $data['author'];
        }
		if(array_key_exists('category',$data)){
            $this->category = $data['category'];
        }
		 if(array_key_exists('image_1',$data)){
            $this->image_1 = $data['image_1'];
        }
		 if(array_key_exists('image_2',$data)){
            $this->image_2 = $data['image_2'];
        }
		 if(array_key_exists('image_3',$data)){
            $this->image_3 = $data['image_3'];
        }
		 if(array_key_exists('image_3',$data)){
            $this->image_3 = $data['image_3'];
        }
		 if(array_key_exists('video',$data)){
            $this->video = $data['video'];
        }
		 if(array_key_exists('area',$data)){
            $this->area = $data['area'];
        }
		 if(array_key_exists('ward_no',$data)){
            $this->ward_no = $data['ward_no'];
        }
		 if(array_key_exists('description',$data)){
            $this->description = $data['description'];
        }
		 if(array_key_exists('admin_feedback',$data)){
            $this->admin_feedback = $data['admin_feedback'];
        }
		 if(array_key_exists('is_fixed',$data)){
            $this->is_fixed = $data['is_fixed'];
        }
		if(array_key_exists('del_id',$data)){
           $del_id= implode(" ", $_POST['del_id']);
            $this->del_id = $del_id;
		}
		if (array_key_exists('latitude', $data)) {
            $this->latitude = $data['latitude'];
        }

        if (array_key_exists('longitude', $data)) {
            $this->longitude = $data['longitude'];
        }
		
			
    }


    public function store()
    {

        $arrData = array($this->title, $this->author, $this->category, $this->image_1, $this->image_2, $this->image_3, $this->video, $this->area, $this->ward_no, $this->description,
            $this->admin_feedback, $this->is_fixed, $this->latitude, $this->longitude);

        $sql = "INSERT INTO reports ( title, author,category, image_1,image_2,image_3,video,area,ward_no,description,admin_feedback,is_fixed, latitude, longitude) VALUES ( ?, ?,? ,? ,? ,? ,? ,? ,? ,? ,? ,?, ?, ?	  )";

        $STH = $this->DBH->prepare($sql);


        $result = $STH->execute($arrData);
        if ($result)
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Has Been Inserted Successfully!</h3></div>");
        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Has not Been Inserted Successfully!</h3></div>");


        Utility::redirect('report_a_problem.php');

    }

   
   

    public function index($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where is_fixed=0 ');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }
	
	    public function index_fixed($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where is_fixed=1 ');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		 //all reports
		 
		 public function all_reports_new($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where admin_feedback="" and  is_fixed=0 and ward_no='.$this->ward_no);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		 		 public function all_reports_new_for_index($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where admin_feedback="" and  is_fixed=0 ');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		 public function all_reports_old($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where admin_feedback!="" and is_fixed=0 and ward_no='.$this->ward_no);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		  public function all_reports_old_for_index($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where admin_feedback!="" and is_fixed=0 ');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		
		public function all_reports_fixed($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where is_fixed=1 and ward_no='.$this->ward_no);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		public function all_reports_fixed_for_index($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where is_fixed=1 ');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         }
		 
		public function all_reports_total_for_index($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports');

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

         } 
	
	    public function view($mode="ASSOC"){
		
		$mode = strtoupper($mode);
        $STH = $this->DBH->query('SELECT * from reports where id='.$this->id);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
		
        $arrOneData  = $STH->fetch();
        return $arrOneData;

    }// end of view()
	
		public function indexPaginator($page=0,$itemsPerPage=3){
        
        $start = (($page-1) * $itemsPerPage);
        
        $sql = "SELECT * from reports where is_fixed=0 LIMIT $start,$itemsPerPage";
        
        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
        
    }// end of indexPaginator();
	
			public function indexPaginator_fixed($page=0,$itemsPerPage=3){
        
        $start = (($page-1) * $itemsPerPage);
        
        $sql = "SELECT * from reports where is_fixed=1 LIMIT $start,$itemsPerPage";
        
        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
        
    }// end of indexPaginator();
	
	
	 public function search($requestArray){
        $sql = "";
        if( isset($requestArray['area']) && isset($requestArray['ward_no']) )  $sql = "SELECT * FROM `reports` WHERE `is_fixed` ='0' AND (`area` LIKE '%".$requestArray['search']."%' OR `ward_no` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['area']) && !isset($requestArray['ward_no']) ) $sql = "SELECT * FROM `reports` WHERE `is_fixed` ='0' AND `area` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['area']) && isset($requestArray['ward_no']) )  $sql = "SELECT * FROM `reports` WHERE `is_fixed` ='0' AND `ward_no` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;
    }// end of search()



    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `reports` WHERE `is_fixed` ='0'";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        // for each search field block start
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->area);
        }

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->area);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->ward_no);
        }
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->ward_no);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords
	
	
	//========================ADMIN Secion STARTS=======================
	
	    public function update(){

     
        $sql = 'UPDATE reports SET is_fixed = 1 where id ='.$this->id;
		
        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($arrData);

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Updated Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Updated Successfully!</h3></div>");

        Utility::redirect('view_reports.php');


    }// end of update()
	
		    public function update_feedback(){
		
		 $arrData  = array($this->admin_feedback);

        $sql = 'UPDATE reports  SET admin_feedback  = ?  where id ='.$this->id;    
		
        $STH = $this->DBH->prepare($sql);

        $result = $STH->execute($arrData);

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Updated Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Updated Successfully!</h3></div>");

        Utility::redirect('view_reports.php');


    }// end of update()
	
	    public function delete(){


        $sql = "Delete from reports where id=".$this->id;

        $STH = $this->DBH->prepare($sql);


        $result = $STH->execute();

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Deleted Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Deleted Successfully!</h3></div>");

        Utility::redirect('view_reports.php');



    }// end of delete

    public function delete_multiple(){

    $arr = explode(" ",$this->del_id );
        foreach ($arr as $id){

            $sql = "Delete from reports where id=".$id;
            $STH = $this->DBH->prepare($sql);
            $result = $STH->execute();
        }


        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Deleted Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Deleted Successfully!</h3></div>");

        Utility::redirect('view_reports.php');

    } // end of multiple delete
	
	


}

?>

