<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class History extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
	}

	public function index()

	{

		$data['judul'] = 'History';
		$data['select'] = $this->db->query("select*from history where name<>'' GROUP BY server")->result_array();
		$data['err'] = $this->db->query("SELECT * FROM history where result<>'' GROUP BY result")->result_array();
		$data['histori'] = $this->db->query("select id,verified,image, concat_ws('-',day(Date), CASE
		WHEN Month (Date)=1 THEN 'Jan'
		WHEN Month (Date)=2 THEN 'Feb'
		WHEN Month (Date)=3 THEN 'Mar'
		WHEN Month (Date)=4 THEN 'Apr'
		WHEN Month (Date)=5 THEN 'May'
		WHEN Month (Date)=6 THEN 'Jun'
		WHEN Month (Date)=7 THEN 'Jul'
		WHEN Month (Date)=8 THEN 'Aug'
		WHEN Month (Date)=9 THEN 'Sep'
		WHEN Month (Date)=10 THEN 'Oct'
		WHEN Month (Date)=11 THEN 'Nov'
		ELSE 'Dec'
		END,year(Date)) as date, date_format(time,'%k.%i') as time, server, name, result, note from history where name<>'' order by cast(date as int) desc")->result_array();

		$data['judul'] = 'Admin Login';
		$this->load->view('template/header', $data);
		$this->load->view('history/index', $data);
		$this->load->view('template/footer');
	}
	public function getcontrol($date, $server, $xeror)
	{
		if ($date == '_') {
			$date = '';
		}
		if ($server == '_') {
			$server = '';
		}
		if ($xeror == '_') {
			$xeror = '';
		}

		$data['histori'] = $this->db->query(
			"select id,verified,image,  concat_ws('-',day(Date), CASE
            WHEN Month (Date)=1 THEN 'Jan'
		WHEN Month (Date)=2 THEN 'Feb'
		WHEN Month (Date)=3 THEN 'Mar'
		WHEN Month (Date)=4 THEN 'Apr'
		WHEN Month (Date)=5 THEN 'May'
		WHEN Month (Date)=6 THEN 'Jun'
		WHEN Month (Date)=7 THEN 'Jul'
		WHEN Month (Date)=8 THEN 'Aug'
		WHEN Month (Date)=9 THEN 'Sep'
		WHEN Month (Date)=10 THEN 'Oct'
		WHEN Month (Date)=11 THEN 'Nov'
		ELSE 'Dec'
            END,year(Date)) as date,
             date_format(time,'%k.%i') as time, server, name, 
             result, note from history where name<>'' and 
             (date like'%" . $date . "%' and replace(server,' ','') like '%" . $server . "%' and replace(result,' ','') like '%" . $xeror . "%')  order by cast(date as int) desc"
		)->result_array();
		// var_dump($date);
		// var_dump($server);
		// var_dump($xeror);
		// var_dump($data);
		$this->load->view('history/table', $data);
	}

	public function user()
	{
		$data['judul'] = 'History';
		$data['select'] = $this->db->query("select*from history where name<>''  GROUP BY server")->result_array();
		$data['err'] = $this->db->query("SELECT * FROM history where result<>'' GROUP BY result")->result_array();
		$data['histori'] = $this->db->query("select id,verified,image, concat_ws('-',day(Date), CASE
		WHEN Month (Date)=1 THEN 'Jan'
		WHEN Month (Date)=2 THEN 'Feb'
		WHEN Month (Date)=3 THEN 'Mar'
		WHEN Month (Date)=4 THEN 'Apr'
		WHEN Month (Date)=5 THEN 'May'
		WHEN Month (Date)=6 THEN 'Jun'
		WHEN Month (Date)=7 THEN 'Jul'
		WHEN Month (Date)=8 THEN 'Aug'
		WHEN Month (Date)=9 THEN 'Sep'
		WHEN Month (Date)=10 THEN 'Oct'
		WHEN Month (Date)=11 THEN 'Nov'
		ELSE 'Dec'
		END,year(Date)) as date, date_format(time,'%k.%i') as time, server, name, result, note from history where name<>'' order by cast(date as int) desc")->result_array();

		$this->load->view('template/headeruser', $data);
		$this->load->view('history/index', $data);
		$this->load->view('template/footer');
	}
}
