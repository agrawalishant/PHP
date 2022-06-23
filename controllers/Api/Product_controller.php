<?php 
defined('BASEPATH') or exit('No direct script access allowed');

Class Product_controller extends CI_Controller
{
public function __construct()
{
    parent::__construct();
}

// ********************************START PRODUCT************************************************

// public function product()
// {
//     $data1 = fetchbyresult('product');
//     $data2 = fetchbyresult('product_subproduct');
//     if(!empty($data1))
//     {
//         $data=array('success'=>"true",'msg'=>"Product Found",'product'=>$data1,'sub_product'=>$data2);
//         echo json_encode($data);
//     }
//     else
//     {
//         $data=array('success'=>'true','msg'=>"No Product Found");
//         echo json_encode($data);
//     }
// }
public function product()
{
    $data11 = fetchbyresult('product');
    foreach($data11 as $dataa1)
    {
        $data['pr_id']=$dataa1['pr_id'];
        $data['pr_url_title']=$dataa1['pr_url_title'];
        $data['pr_title']=$dataa1['pr_title'];
        $data['pr_description']=$dataa1['pr_description'];
        $data['pr_image']=$dataa1['pr_image'];
        $data['pr_image_certificate']=$dataa1['pr_image_certificate'];
        $data['pr_category']=$dataa1['pr_category'];
        $data['pr_originalprice']=$dataa1['pr_originalprice'];
        $data['pr_pricedetail']=$dataa1['pr_pricedetail'];
        $data['pr_discount']=$dataa1['pr_discount'];
         $data['pr_finalprice']=$dataa1['pr_finalprice'];
          $data['pr_rating']=$dataa1['pr_rating'];
           $data['status']=$dataa1['status'];
            $data['pr_modifieddate']=$dataa1['pr_modifieddate'];
             $data['timestamp']=$dataa1['timestamp'];
       $qry= fetchbyresultByCondictionRow('product_subproduct',array('sp_product_id'=>$dataa1['pr_id']));
       if(!empty($qry)){
         $data['subproduct_status']="1";
       }else
       {
          $data['subproduct_status']="0"; 
       }
            $data1[]=$data; 
    }
    $data2 = fetchbyresult('product_subproduct');
    if(!empty($data1))
    {
        $data=array('success'=>"true",'msg'=>"Product Found",'product'=>$data1,'sub_product'=>$data2);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"No Product Found");
        echo json_encode($data);
    }
}
public function productByCategory()
{
    $category = $this->input->post('category');
    $data = fetchbyresultwhere('product',array('pr_category'=>$category));
    if(!empty($data))
    {
        $result=array('success'=>"true",'msg'=>"Product Found",'product'=>$data);
    }
    else
    {
        $result=array('success'=>'true','msg'=>"No Product Found");
    }
    echo json_encode($result);
}

// *****************************END PRODUCT************************************************



public function addtocart()
{
    $userid = $this->input->post('userid');
    $productid = $this->input->post('productid');
    $price = $this->input->post('price');
    //$quantity = $this->input->post('quantity');

    $req = fetchbyresultwhere('addtocart',array('user_id'=>$userid,'product_id'=>$productid));
    //print_r($req[0]);exit;
    if(!empty($req[0]))
    {
        $id = $req[0]['id'];
        $updateData['product_id'] = $productid;
        $updateData['product_price'] = $price;
        $updateData['quantitys'] = '1';
        $updateData['status'] = '1';

        $res = updateData('addtocart',$updateData,array('id'=>$id));
        $where = "addtocart.product_id = product.pr_id";
        $con = 'addtocart.user_id ='.$userid;
        $req = twotablejoin('addtocart','product',$where,$con);
        $totalamt = 0;
        foreach($req as $val){
        if($val['quantitys']>1){
            $ok = $val['final_amount'];
        }else{
            $ok = $val['product_price'];    
        }
        $totalamt = $totalamt+$ok;
        
        }
        $result = array('success'=>'true','data'=>$req,'Total Amount'=>$totalamt,'msg'=>'Product add to cart');    
        
    }
    else
    {
        $InsertData = [
                        'user_id' => $userid,
                        'product_id' => $productid,
                        'product_price' => $price,
                        'quantitys' => '1',
                        'status' => '1'
                    ];
        $res = addDatas('addtocart',$InsertData);    
        //$lastid = $this->db->insert_id();
        //$req = fetchbyresultwhere('addtocart',array('id'=>$lastid));
        $where = "addtocart.product_id = product.pr_id";
        $con = 'addtocart.user_id ='.$userid;
        $req = twotablejoin('addtocart','product',$where,$con);
        $totalamt = 0;
        foreach($req as $val){
            if($val['quantitys']>1){
                $ok = $val['final_amount'];
            }else{
                $ok = $val['product_price'];    
            }
            $totalamt = $totalamt+$ok;
            //$pd[] = fetchbyresultwhere('product',array('pr_id'=>$val['product_id']));
        }
        $result = array('success'=>'true','data'=>$req,'Total Amount'=>$totalamt,'msg'=>'Product add to cart');
    }
    echo json_encode($result);
}

public function IncrementProduct()
{
    $id = $this->input->post('id');
    $data = fetchbyresultwhere('addtocart',array('id'=>$id));
   // print_r($data[0]);exit;
    if(!empty($data[0]))
    {
        $qut = $data[0]['quantitys'];
        $quantity = $qut + 1;
        $updateDatass['quantitys'] = $quantity;
        $price = $data[0]['product_price'];
        $finalamt = $price * $quantity;
        $updateDatass['final_amount'] = $finalamt;
        $res = updateData('addtocart',$updateDatass,array('id'=>$id));
        //echo $this->db->last_query();
        //print_r($res);exit;
        if(!empty($res))
        {
            $req = fetchbyresultwhere('addtocart',array('id'=>$id));
            //print_r($req);exit;
            $userid = $req[0]['user_id'];
            $where = "addtocart.product_id = product.pr_id";
            $con = 'addtocart.user_id ='.$userid;
            $reqs = twotablejoin('addtocart','product',$where,$con);
            $totalamt = 0;
            foreach($reqs as $val){
                if($val['quantitys']>1){
                    $ok = $val['final_amount'];
                }else{
                    $ok = $val['product_price'];    
                }
                $totalamt = $totalamt+$ok;
            }
            $result = array('success'=>'true','data'=>$req,'Total Amount'=>$totalamt, 'msg'=>'Product Incremented Successfully.');    
        }
        else
        {
            $result = array('success'=>'true','msg'=>'Product Not Increment.');
        }
    }
    else
    {
        $result = array('success'=>'true','msg'=>'Product Not Found.');
    }
    echo json_encode($result);
}

public function DecrementProduct()
{
    $id = $this->input->post('id');
    $data = fetchbyresultwhere('addtocart',array('id'=>$id));
    
    if(!empty($data))
    {
        $quantity = $data[0]['quantitys'];
        if($quantity>1)
        {
            $quantity = $quantity-1;
            $updateData['quantitys'] = $quantity;
            $price = $data[0]['product_price'];
            $finalamt = $price * $quantity;
            $updateData['final_amount'] = $finalamt;
        }
        else
        {
            $updateData['quantitys'] = '1';
            $price = $data[0]['product_price'];
            $finalamt = $price * $quantity;
            $updateData['final_amount'] = $finalamt;
        }
        $res = updateData('addtocart',$updateData,array('id'=>$id));
        if(!empty($res))
        {
            $req = fetchbyresultwhere('addtocart',array('id'=>$id));
            $userid = $req[0]['user_id'];
            $where = "addtocart.product_id = product.pr_id";
            $con = 'addtocart.user_id ='.$userid;
            $reqs = twotablejoin('addtocart','product',$where,$con);
            $totalamt = 0;
            foreach($reqs as $val){
                if($val['quantitys']>1){
                    $ok = $val['final_amount'];
                }else{
                    $ok = $val['product_price'];    
                }
                $totalamt = $totalamt+$ok;
            }
            $result = array('success'=>'true','data'=>$req,'Total Amount'=>$totalamt, 'msg'=>'Product Decremented Successfuly.');    
        }
    }
    else
    {
        $result = array('success'=>'true','msg'=>'Product Not Increment.');
    }
    echo json_encode($result);
}

// public function RemoveProductToCart()
// {
//     $id = $this->input->post('id');
    
//     $req = fetchbyresultwhere('addtocart',array('id'=>$id));
//     $userid = $req[0]['user_id'];
//     $where = "addtocart.product_id = product.pr_id";
//     $con = 'addtocart.user_id ='.$userid;
//     $req = twotablejoin('addtocart','product',$where,$con);
    
//     $data = deleteByWhere('addtocart',array('id'=>$id));
//     if(!empty($data))
//     {
//         $result = array('success'=>'true','data'=>$req,'msg'=>'Product Romove Successfully.');
//     }
//     else
//     {
//         $result = array('success'=>'true','msg'=>'Product Not Romove.');
//     }
//     echo json_encode($result);
// }
public function RemoveProductToCart()
{
    $id = $this->input->post('id');
    $userid = $this->input->post('userid');
   $data = deleteByWhere('addtocart',array('id'=>$id));
    $req = fetchbyresultwhere('addtocart',array('id'=>$id));
  //  $userid = $req[0]['user_id'];
    $where = "addtocart.product_id = product.pr_id";
    $con = 'addtocart.user_id ='.$userid;
    $req = twotablejoin('addtocart','product',$where,$con);
     
    if(!empty($data))
    {
        $result = array('success'=>'true','data'=>$req,'msg'=>'Product Romove Successfully.');
    }
    else
    {
        $result = array('success'=>'true','msg'=>'Product Not Romove.');
    }
    echo json_encode($result);
}
public function productDetails()
{
    $id = $this->input->post('id');
    //  $data = fetchbyresultwhere('product',array('pr_id'=>$id));

    $data1=$this->db->get_where('product',array('pr_id'=>$id))->result_array();
    if(!empty($data1))
    {
		//echo $this->db->last_query();exit;
        $data2['pr_id']=$data1[0]['pr_id'];
        $data2['pr_title']=$data1[0]['pr_title'];
		//$data2['pr_description']=strip_tags($data1[0]['pr_description']);
        $ab=strip_tags($data1[0]['pr_description']);
		$data2['pr_description']=str_replace("&nbsp;","", $ab); 
    	$data2['pr_image']=$data1[0]['pr_image'];
        $data2['pr_image_certificate']=$data1[0]['pr_image_certificate'];
        $data2['pr_category']=$data1[0]['pr_category'];
        $data2['pr_originalprice']=$data1[0]['pr_originalprice'];
        $data2['pr_pricedetail']=$data1[0]['pr_pricedetail'];
        $data2['pr_discount']=$data1[0]['pr_discount'];
        $data2['pr_finalprice']=$data1[0]['pr_finalprice'];
        $data2['pr_rating']=$data1[0]['pr_rating'];
        $data2['pr_modifieddate']=$data1[0]['pr_modifieddate'];
        $data2['status']=$data1[0]['status'];
        $data2['timestamp']=$data1[0]['timestamp'];
        $qry= fetchbyresultByCondictionRow('product_subproduct',array('sp_product_id'=>$data2['pr_id']));
       if(!empty($qry)){
         $data2['subproduct_status']="1";
       }else
       {
          $data2['subproduct_status']="0"; 
       }
       
        $data[]=$data2;
        //print_r($data);exit;
        if(!empty($data))
        {
            $res = fetchbyresultwhere('product_subproduct',array('sp_product_id'=>$id));
            if(!empty($res))
            { 
                // foreach($res as $req){
                //     $val[] = $req['sp_weight_carat']*$data1[0]['pr_finalprice'];
                // }
                // $val['prices'] = $val;
                //$data=array('success'=>"true",'msg'=>"Product Found",'product'=>$data,'sub_product'=>$res,'price'=>$val);
                $data=array('success'=>"true",'msg'=>"Product Found",'product'=>$data,'sub_product'=>$res);
            }
            else
            {
                $data=array('success'=>"true",'msg'=>"Product Found",'product'=>$data);
            }
        }
        else
        {
            $data=array('success'=>'true','msg'=>"No Product Found");
        }
    }
    else
    {
        $data=array('success'=>'true','msg'=>"No Product Found");
    }
    echo json_encode($data);

}

// ********************************START category_product************************************************



public function category_product()
{
    $data = fetchbyresult('category_product');
    if(!empty($data))
    {
        $data=array('status'=>"true",'msg'=>"success",'userdata'=>$data);
        echo json_encode($data);
    }
    else
    {
        $data=array('status'=>'false','msg'=>"No Product Category Found");
        echo json_encode($data);
    }
}

// ********************************END category_product categories************************************************



// search by name search by category



// end of file











}











?>