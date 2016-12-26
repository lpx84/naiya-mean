<?php

/**
 *生成验证码图片，并将code保存到session['validatcode']中
 *
 *@auth:scort
 *@date:20160417
 *
 *@param    integer     width       图片宽度  默认 150
 *@param    integer     height      图片高度  默认 50
 *@param    integer     length      验证码的个数  默认 4
 *@param    integer     lineCount   干扰线条数  默认 5
 *@param    integer     pointCount  干扰点数  默认 1000
 *@param    integer     padding     内容内补  默认 5
 *@param    string      context     内容  默认 null
 *@return   resource    image       可以直接用于img标签的src属性
 *
 */
function imageValidate($width = 150, $height = 50, $length = 4, $lineCount = 5, $pointCount = 1000, $padding = 5, $context = null){
    
    //1.创建画布
    $img = imagecreatetruecolor($width,$height);
    $bgColor = imagecolorallocate($img,rand(205,255),rand(205,255),rand(205,255));
    imagefill($img,0,0,$bgColor);
    
    //2.画图写字
    //干扰点
    for($i=0; $i < $pointCount; $i++){
        $pointColor = imagecolorallocate($img,rand(80,200),rand(80,200),rand(80,200));
        imagesetpixel($img,rand($padding,$width-$padding),rand($padding,$height-$padding),$pointColor);
    }
    
    //$borderColor = imagecolorallocate($img,rand(80,125),rand(80,125),rand(80,125));
    //imagerectangle($img,5,5,143,43,$borderColor);
    
    //干扰线
    for($i = 0; $i < $lineCount; $i++){
        $lineColor = imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
        imageline($img,rand($padding,$padding*4),rand($padding,$height-$padding*2),rand($width-$padding*4,$width-$padding*2),rand($padding,$height-$padding*2),$lineColor);
    }
    
    //文字
    $result = '';
    $str = isset($context) && is_string($context)? $context : '123456789ASDFGHJKLQWERTYUIOPZXCVBNM';
    for($i = 0; $i < $length; $i++){
        $size = rand(floor($width/$height)*8,floor($width/$height)*8+2);
        $jiaodu = rand(-20,20);
        $x = intval(($width-2*$padding)/($length<=0?1:$length))*$i + 2*$padding;
        $y = intval($height/2)+intval($size/2);
        
        //$x = 35*$i + 15;
        //$y = 35;
        $color = imagecolorallocate($img,rand(0,150),rand(0,150),rand(0,150));
        //$type = __DIR__.'/simhei.ttf';
        $type = TTF;
        $text = $str[rand(0,strlen($str)-1)];
        $result .= $text;
        
        imagettftext($img,$size,$jiaodu,$x,$y,$color,$type,$text);
    }
    
    // session_start();
    // $_SESSION['vcode'] = $result;

    session(['vcode' => $result]);
    
    //3.输出或保存
    header('content-type:image/jpeg');
    imagejpeg($img);
    
    //4.释放
    imagedestroy($img);
}

/**
 *等比例图片缩放 
 *
 *@auth:scort
 *@date:20160417
 *
 *@param    resource    imageFile   图片文件名   必选
 *@param    integer     newWidth    新图片宽     必选
 *@param    integer     newHeight   新图片高     必选
 *@param    string      newFileName 缩放后图片名 可选
 *@param    string      newDir      缩放图片目录 可选
 *@param    boolean     ratio      是否等比例 可选 默认为是等比例
 *@return   string      newFileName 缩放后图片名
 */
function imageZoom($imageFile, $newWidth, $newHeight, $newFileName = null, $newDir = null, $ratio = true){
    $args = func_get_args();
    $types = array(1=>'gif',2=>'jpeg',3=>'png');
    $fileInfo = getimagesize($imageFile);
    $oldWidth = $fileInfo[0];
    $oldHeight = $fileInfo[1];
    
    $imageCreate = 'imagecreatefrom'.$types[$fileInfo[2]];
    $imageSave = 'image'.$types[$fileInfo[2]];
    //2.画布-获取背景图
    $oldImg = $imageCreate($imageFile);
    
    if($ratio){
        //等比例公式
        if($newWidth && ($oldWidth < $oldHeight)){
            $newWidth = ($newHeight / $oldHeight) * $oldWidth;
        }else{
            $newHeight = ($newWidth / $oldWidth) * $oldHeight;
        }
    }
    
    $newImg = imagecreatetruecolor($newWidth, $newHeight);
    $newBg = imagecolorallocate($newImg,255,255,255);
    imagefill($newImg,0,0,$newBg);
    
    //3.设置图片
    imagecopyresampled($newImg,$oldImg,0,0,0,0,$newWidth,$newHeight,$oldWidth,$oldHeight);
    
    $path = pathinfo($imageFile);
    //4.保存
    if(!isset($newFileName)){
        $newFileName = $path['basename'];
        // $newFileName = $newWidth.'_'.$newFileName;
    }
    
    $imageSave($newImg,isset($newDir)?$newDir.$newFileName:$path['dirname'].'/'.$newFileName);
    
    
    //5.释放
    imagedestroy($newImg);
    imagedestroy($oldImg);
    
    return $newFileName;
}

/**
 *图片水印
 *
 *@auth:scort
 *@date:20160417
 *
 *@param    string      waterImg        水印图片文件名        必选
 *@param    string      sourceImg       要加水印图片文件名    必选
 *@param    string      newFileName     处理后图片名          可选
 *@param    string      newDir          处理图片目录          可选
 *@return   string      newFileName     处理后图片名
 */
function imageWaterMark($waterImg, $sourceImg, $newFileName = null, $newDir = null){
    $types = array(1=>'gif',2=>'jpeg',3=>'png');
    $waterImgInfo = getimagesize($waterImg);
    $waterImgCreate = 'imagecreatefrom'.$types[$waterImgInfo[2]];
    
    
    $sourceImgInfo = getimagesize($sourceImg);
    $sourceImgCreate = 'imagecreatefrom'.$types[$sourceImgInfo[2]];
    $sourceImgSave = 'image'.$types[$sourceImgInfo[2]];
    
    //水印图片
    $sImg = $waterImgCreate($waterImg);
    $sW = imagesX($sImg);
    $sH = imagesY($sImg);
    
    //要加水印图片
    $yImg = $sourceImgCreate($sourceImg);
    $yW = imagesX($yImg);
    $yH = imagesY($yImg);
    
    //加水印
    $x = $yW - $sW;
    $y = $yH - $sH;
    imagecopy($yImg,$sImg,$x,$y,0,0,$sW,$sH);
    
    
    //保存
    if(!isset($newFileName)){
        $path = pathinfo($sourceImg);
        $newFileName = $path['basename'];
    }
    
    $sourceImgSave($yImg,isset($newDir)?$newDir.$newFileName:$newFileName);
    
    //释放
    imagedestroy($yImg);
    imagedestroy($sImg);
    
    return $newFileName;
}

//用户会员等级
function grade($num)
{
	if($num <= 1500)
	{
		return '奶牙';
	}else if(1501 <= $num && $num <= 7500)
	{
		return '小奶粉';
	}else if(7501 <= $num && $num <= 15000)
	{
		return '中奶粉';
	}else if(15001 <= $num && $num <= 25000)
	{
		return '大奶粉';
	}else if(25001 <= $num && $num <= 50000)
	{
		return '超级奶粉';
	}else if($num > 50000)
	{
		return '至尊奶粉';
	}
	
}

function getData()
{
    $data = DB::table('cate')
            -> where('pid',0)
            -> get();
            
            
    $cate = DB::table('cate as c1') 
            -> select('c1.*',DB::raw("concat(m_c1.path, ',', m_c1.id) as newPath"), 'c2.name as pname')
            -> leftJoin('cate as c2', 'c1.pid', '=', 'c2.id')
            -> orderBy('newPath', 'ASC')
            -> get();
    
    //二级分类
    $prefix = config('database.connections.mysql.prefix');
    $sql2 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0)';
    
    $res2 = DB::select($sql2);
    
    //三级分类
    $sql3 = 'select * from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid in (select id from '.$prefix.'cate where pid = 0))';
    
    $res3 = DB::select($sql3);
    
    //热卖大牌
    $hot = DB::table('brand as b')
            -> leftJoin('cate as c','b.cid','=','c.id')
            -> leftJoin('cate as c2','c.pid','=','c2.id')
            -> select('b.*','c2.pid as c2d','c.name as cname')
            -> where('b.status','2')
            -> limit(9)
            -> get();
    $frefix = 'm_';		
    return [
            $frefix.'data' => $data,
            $frefix.'cate' => $cate,
            $frefix.'res2' => $res2,
            $frefix.'res3' => $res3,
            $frefix.'hot' => $hot
            
        ];
}
	