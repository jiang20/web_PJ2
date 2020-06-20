<?php
function getCountry($result){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM geocountries where ISO =:countryiso';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':countryiso',$result['CountryCodeISO']);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['CountryName'];
        return $item['CountryName'];
    }
    return null;
}
function getCity($result){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM geocities where GeoNameID =:cityNode';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':cityNode',$result['CityCode']);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['AsciiName'];
        return $item['AsciiName'];
    }
    return null;
}
function getFavor($imageId){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT count(*) as number FROM travelimagefavor where ImageID =:imageID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':imageID',$imageId);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['number'];
    }
    return null;
}
function getNameFromUID($userID){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT *  FROM traveluser where UID =:userID';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':userID',$userID);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['UserName'];
    }
    return null;
}

function getUIDFromNAME($username){
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT *  FROM traveluser where UserName =:username';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':username',$username);
    $statement->execute();
    if($item = $statement->fetch()){
//        echo $item['number'];
        return $item['UID'];
    }
    return null;
}
?>
