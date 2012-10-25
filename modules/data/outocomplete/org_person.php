
<?php
$org_id = $_POST['org_id'];

if (!empty($org_id) && isset($org_id)) {
    $query_org_person = "SELECT `OrganisationPersonID`, `FullName`, `Designation`
                       FROM tblgenorganisationpeople
                      WHERE OrganisationPersonID = '$org_id'
                   ORDER BY `FullName` ASC";
    $result_org_person = mysql_query($query_org_person) or die(mysql_error());
    while ($person = mysql_fetch_array($result_org_person)) {
        ?>
        <option value="<?php echo $person['OrganisationPersonID'] ?>"><?php echo $person['FullName'] ?></option>
        <?php
    }
}
?>
