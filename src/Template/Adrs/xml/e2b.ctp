<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; echo "\n"; ?>
<!DOCTYPE ichicsr SYSTEM "http://eudravigilance.ema.europa.eu/dtd/icsr21xml.dtd">
<ichicsr lang="en">
    <ichicsrmessageheader>
        <messagetype>ichicsr</messagetype>
        <messageformatversion>2.1</messageformatversion>
        <messageformatrelease>2.0</messageformatrelease>
        <messagenumb>999999</messagenumb>
        <messagesenderidentifier>MCAZ</messagesenderidentifier>
        <messagereceiveridentifier/>
        <messagedateformat>204</messagedateformat>
        <messagedate><?php echo date('YmdHis');?></messagedate>
    </ichicsrmessageheader>
     <safetyreport>
        <safetyreportversion>1</safetyreportversion>
        <safetyreportid>ZW-MCAZ-<?php
            echo $adr['reference_number'];
        ?></safetyreportid>
        <primarysourcecountry>ZW</primarysourcecountry>
        <occurcountry>ZW</occurcountry>
        <transmissiondateformat/>
        <transmissiondate/>
        <reporttype>1</reporttype>
        <serious><?php
                    echo 1;
            ?></serious>
        <seriousnessdeath><?= ($adr['sae_type'] == 'Fatal') ? 1 : 0; ?></seriousnessdeath>
        <seriousnesslifethreatening><?= ($adr['sae_type'] == 'Life-threatening (an actual risk of death at the time of the event).') ? 1 : 0; ?></seriousnesslifethreatening>
        <seriousnesshospitalization><?= ($adr['sae_type'] == 'Caused or prolonged hospitalization (non-elective).') ? 1 : 0; ?></seriousnesshospitalization>
        <seriousnessdisabling><?= ($adr['sae_type'] == 'Resulted in persistent or significant disability or incapacity.') ? 1 : 0; ?></seriousnessdisabling>
        <seriousnesscongenitalanomali><?= ($adr['sae_type'] == 'Congenital-anomaly') ? 1 : 0; ?></seriousnesscongenitalanomali>
        <seriousnessother><?= ($adr['sae_type'] == 'Any other important medical event.') ? 1 : 0; ?></seriousnessother>
        <receivedateformat>102</receivedateformat>
        <receivedate><?php echo date('Ymd', strtotime($adr['created'])); ?></receivedate>
        <receiptdateformat>102</receiptdateformat>
        <receiptdate><?php echo date('Ymd'); ?></receiptdate>
        <additionaldocument><?php
            if (count($adr['attachments']) > 0) {
                echo 1;
            } else {
                echo 2;
            }
        ?></additionaldocument>
        <documentlist><?php
            foreach ($adr['attachments'] as $attachment):
                echo $attachment['description'].', ';
            endforeach;
        ?></documentlist>
        <fulfillexpeditecriteria><?php
                echo 1;
        ?></fulfillexpeditecriteria>
        <authoritynumb>ZW-MCAZ-<?php
            echo $adr['reference_number'];
        ?></authoritynumb>
        <companynumb/>
        <duplicate/>
        <casenullification/>
        <nullificationreason/>
        <medicallyconfirm><?php
            if ($adr['designation_id'] == 1 || $adr['designation_id'] == 2 || $adr['designation_id'] == 3 ) {
                echo 1;
            } else { echo 2;}
        ?></medicallyconfirm>
        <?php $arr = preg_split("/[\s]+/", $adr['reporter_name']); ?>
        <primarysource>
            <reportergivename><?php if (isset($arr[0])) echo $arr[0]; ?></reportergivename>
            <reporterfamilyname><?php if (isset($arr[1])) echo $arr[1].' '; if (isset($arr[2])) echo $arr[2];  ?></reporterfamilyname>
            <reporterorganization><?php echo $adr['name_of_institution']; ?></reporterorganization>
            <reporterdepartment/>
            <reporterstreet/>
            <reportercity/>
            <reporterstate/>
            <reporterpostcode/>
            <reportercountry>ZW</reportercountry>
            <qualification><?php echo $adr['designation_id']; ?></qualification>
            <literaturereference/>
            <studyname/>
            <sponsorstudynumb/>
            <observestudytype/>
        </primarysource>
        <sender>
            <sendertype>3</sendertype>
            <senderorganization>Medicines Control Authority of Zimbabwe</senderorganization>
            <senderdepartment>Department of Pharmacovigilance</senderdepartment>
            <sendertitle/>
            <sendergivename/>
            <sendermiddlename/>
            <senderfamilyname/>
            <senderstreetaddress/>
            <sendercity/>
            <senderstate/>
            <senderpostcode/>
            <sendercountrycode>ZW</sendercountrycode>
            <sendertel>772145191</sendertel>
            <sendertelextension/>
            <sendertelcountrycode>263</sendertelcountrycode>
            <senderfax>736980</senderfax>
            <senderfaxextension>04</senderfaxextension>
            <senderfaxcountrycode>263</senderfaxcountrycode>
            <senderemailaddress>mcaz@mcaz.co.zw</senderemailaddress>
        </sender>
        <receiver>
            <receivertype/>
            <receiverorganization/>
            <receiverdepartment/>
            <receivertitle/>
            <receivergivename/>
            <receivermiddlename/>
            <receiverfamilyname/>
            <receiverstreetaddress/>
            <receivercity/>
            <receiverstate/>
            <receiverpostcode/>
            <receivercountrycode/>
            <receivertel/>
            <receivertelextension/>
            <receivertelcountrycode/>
            <receiverfax/>
            <receiverfaxextension/>
            <receiverfaxcountrycode/>
            <receiveremailaddress/>
        </receiver>
        <patient>
            <patientinitial><?php echo $adr['participant_number']; ?></patientinitial>
            <patientgpmedicalrecordnumb><?php echo $adr['participant_number']; ?></patientgpmedicalrecordnumb>
            <patientspecialistrecordnumb><?php echo $adr['participant_number']; ?></patientspecialistrecordnumb>
            <patienthospitalrecordnumb><?php echo $adr['participant_number']; ?></patienthospitalrecordnumb>
            <patientinvestigationnumb/>
            <?php
                if (!empty($adr['date_of_birth']) && $adr['date_of_birth'] != '--') {
                    $a = explode('-', $adr->date_of_birth);
                    $adr->date_of_birth = array('day'=> $a[0],'month'=> $a[1],'year'=> $a[2]);
                    $birthdatef = 102;
                    if (empty($adr['date_of_birth']['day']) && empty($adr['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    } else if (empty($adr['date_of_birth']['day']) && !empty($adr['date_of_birth']['month'])) {
                        $birthdatef = 610;
                    } else if (!empty($adr['date_of_birth']['day']) && empty($adr['date_of_birth']['month'])) {
                        $birthdatef = 602;
                    }
                    echo '<patientbirthdateformat>'.$birthdatef.'</patientbirthdateformat>';
                    echo "\n";
                } else {
                    echo '<patientbirthdateformat/>';
                    echo "\n";
                }

                if(isset($birthdatef)) {
                    echo '<patientbirthdate>';
                    if($birthdatef == 102) echo date('Ymd', strtotime(implode('-', $adr['date_of_birth'])));
                    if($birthdatef == 602) echo $adr['date_of_birth']['year'];
                    if($birthdatef == 610) echo $adr['date_of_birth']['year'].$adr['date_of_birth']['month'];
                    echo '</patientbirthdate>';
                    echo "\n";
                } else {
                    echo '<patientbirthdate/>';
                    echo "\n";
                }
                ?>
            <patientonsetage/>
            <patientonsetageunit/>
            <gestationperiod/>
            <gestationperiodunit/>
            <patientweight/>
            <patientheight/>
            <patientsex><?php
                if($adr['gender'] == 'Male') echo 1 ;
                elseif($adr['gender'] == 'Female') echo 2 ;
            ?></patientsex>
            <lastmenstrualdateformat/>
            <patientlastmenstrualdate/>
            <patientmedicalhistorytext><?php echo $adr['medical_history']; ?></patientmedicalhistorytext>
            <resultstestsprocedures/>
            <patientdeath>
                <patientdeathdateformat/>
                <patientdeathdate/>
                <patientautopsyyesno/>
            </patientdeath>
            <reaction>
                <primarysourcereaction><?php echo $adr['diagnosis']; ?></primarysourcereaction>
                <reactionmeddraversionllt>WHO-ART</reactionmeddraversionllt>
                <reactionmeddrallt/>
                <reactionmeddraversionpt/>
                <reactionmeddrapt/>
                <termhighlighted/>
                <reactionstartdateformat><?php
                    $onsetf = 102;
                    echo $onsetf;
                ?></reactionstartdateformat>
                <reactionstartdate><?php
                    echo date('Ymd', strtotime($adr->date_of_adverse_event));
                ?></reactionstartdate>
                <reactionenddateformat/>
                <reactionenddate/>
                <reactionduration/>
                <reactiondurationunit/>
                <reactionfirsttime/>
                <reactionfirsttimeunit/>
                <reactionlasttime/>
                <reactionlasttimeunit/>
                <reactionoutcome/>
            </reaction>
            <?php foreach ($adr['adr_list_of_drugs'] as $saefiListOfDrug): ?>
            <drug>
                <drugcharacterization/>
                <medicinalproduct><?php echo $saefiListOfDrug['drug_name']; ?></medicinalproduct>
                <obtaindrugcountry/>
                <drugbatchnumb/>
                <drugauthorizationnumb/>
                <drugauthorizationcountry/>
                <drugauthorizationholder/>
                <drugstructuredosagenumb><?php echo $saefiListOfDrug['dosage']; ?></drugstructuredosagenumb>
                <drugstructuredosageunit><?php
                    if(!empty($saefiListOfDrug['dose_id'])) {
                        $result = $doses->all();
                        $data = $result->toArray();
                        echo $data[$saefiListOfDrug['dose_id']];
                    };
                ?></drugstructuredosageunit>
                <drugseparatedosagenumb/>
                <drugintervaldosageunitnumb/>
                <drugintervaldosagedefinition/>
                <drugcumulativedosagenumb/>
                <drugcumulativedosageunit/>
                <drugdosagetext/>
                <drugdosageform/>
                <drugadministrationroute><?php
                    if(!empty($saefiListOfDrug['route_id'])) {
                        $result = $routes->all();
                        $data = $result->toArray();
                        echo $data[$saefiListOfDrug['route_id']];
                    };
                ?></drugadministrationroute>
                <drugparadministration/>
                <reactiongestationperiod/>
                <reactiongestationperiodunit/>
                <drugindicationmeddraversion/>
                <drugindication><?php echo $saefiListOfDrug['indication']; ?></drugindication>
                <drugstartdateformat><?php if (!empty($saefiListOfDrug['start_date'])) echo 102; ?></drugstartdateformat>
                <drugstartdate><?php if (!empty($saefiListOfDrug['start_date'])) echo date('Ymd', strtotime($saefiListOfDrug['start_date']))?></drugstartdate>
                <drugstartperiod/>
                <drugstartperiodunit/>
                <druglastperiod/>
                <druglastperiodunit/>
                <drugenddateformat/>
                <drugenddate/>
                <drugtreatmentduration/>
                <drugtreatmentdurationunit/>
                <actiondrug/>
                <drugrecurreadministration/>
                <drugadditional/>
                <activesubstance>
                    <activesubstancename><?php echo $saefiListOfDrug['drug_name']; ?></activesubstancename>
                </activesubstance>
                <drugreactionrelatedness>
                    <drugreactionassesmeddraversion>WHO-ART</drugreactionassesmeddraversion>
                    <drugreactionasses/>
                    <drugassessmentsource/>
                    <drugassessmentmethod>WHO causality</drugassessmentmethod>
                    <drugresult><?php
                            if(strtolower($saefiListOfDrug['relationship_to_sae']) == 'Definitely related') echo 'Definitely related';
                            if(strtolower($saefiListOfDrug['relationship_to_sae']) == 'Probably related') echo 'Probably related';
                            if(strtolower($saefiListOfDrug['relationship_to_sae']) == 'Possibly related') echo 'Possibly related';
                            if(strtolower($saefiListOfDrug['relationship_to_sae']) == 'Not related') echo 'Not related';
                            if(strtolower($saefiListOfDrug['relationship_to_sae']) == 'Pending') echo 'Pending';
                    ?></drugresult>
                </drugreactionrelatedness>
            </drug>
            <?php  endforeach; ?>
            <summary>
                <narrativeincludeclinical><?php echo $adr['immediate_cause']; ?></narrativeincludeclinical>
                <reportercomment><?php echo $adr['investigations']; ?></reportercomment>
                <senderdiagnosismeddraversion>WHO-ART</senderdiagnosismeddraversion>
                <senderdiagnosis><?php echo $adr['diagnosis']; ?></senderdiagnosis>
                <sendercomment/>
            </summary>
        </patient>
    </safetyreport>
</ichicsr>