<?php

if (isset($_POST['engagement'])) {
    $engagement = $_POST['engagement'];
    $associations = $_POST['associations'];
    $metadata = $_POST['metadata'];

    $metadata['startTime'] = !empty($metadata['startTime']) ? strtotime($metadata['startTime']) : null;
    $metadata['endTime'] = !empty($metadata['endTime']) ? strtotime($metadata['endTime']) : null;

    $hubSpot = Helpers\HubspotClientHelper::createFactory();

    $response = $hubSpot->engagements()->create($engagement, $associations, $metadata);

    $clientId = $associations['contactIds'][0];

    header('Location: /contacts/show.php?vid='.$clientId);
}