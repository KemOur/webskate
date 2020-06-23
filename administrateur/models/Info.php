<?php

function getInfos()
{
    $db = dbConnect();
    $query = $db->query('SELECT * FROM infos');
    $infos = $query->fetchAll();
    return $infos;
}

function addInfo($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO infos (sujet, news) VALUES( :sujet, :news)");
    $result = $query->execute([
        'sujet' => $informations['sujet'],
        'news' => $informations['news'],
    ]);

    return $result;
}

function delInfo($id)
{
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM infos WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;
}



function getInfo($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM infos WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}


function editInfo($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE infos SET sujet = ?, news = ? WHERE id = ?');
    $result = $query->execute(
        [
            $informations['sujet'],
            $informations['news'],
            $id,
        ]
    );

    return $result;
}

