<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body style="padding: 10px; margin: 0 auto;font-size: 12px;font-weight: 400;color: #000;font-family: 'Arial';box-sizing: border-box;">
<section style="position: relative;font-size: 14px; letter-spacing: .5px; font-family: 'Calibri';">
    <div>
        <h1 style="margin: 0;font-size: 60px;display: inline-block;padding-bottom: 0;line-height: 1em;color: #42474d;"> <span style="color: #024c84;">Vir</span>Intel </h1><span style="font-size: 16px;vertical-align: 28px;line-height: 1.5em;">&trade;</span> <br><span style="font-size: 14px;">Coronavirus Immunity Diagnostics</span>
    </div>
    <h4 style="margin-bottom: 10px;margin-top: 30px;text-align: center;">VIRINTEL COVID-19 ANTIBODY TEST</h4>
    <p>Patient: <span>{{$vale['patient_name']}}&nbsp;&nbsp;&nbsp;&nbsp;</span><span>DOB:{{$vale['dob']}} &nbsp;&nbsp;&nbsp;&nbsp;</span> <span>Ordering Physician: {{$vale['doctor_name']}} MD</span> </p>
    <h4 style="margin-bottom: 10px;">Result: <span>@if ($vale['rbd']>1 and $vale['n']>1)
                POSITIVE;
            @else
                NEGATIVE;
            @endif</span>@if($vale['rbd']>1 and $vale['n']<1)
                (TEST REPEAT IS RECOMMENDED IN 4-6 WEEKS)
            @else

            @endif</span></h4>
    <h4 style="margin-bottom: 10px;text-decoration: underline;">About this test</h4>
    <p> The VirIntel COVID-19 Antibody Test is intended for use as an aid in identifying individuals with an adaptive immune response to SARS-CoV-2, indicating recent or prior infection. VirIntel COVID-19 Antibody Test detects the presence of IgG antibodies targeting two SARS-CoV-2 proteins: a receptor-binding domain of surface glycoprotein (RBD) and nucleocapsid protein (N) in blood serum. The viral proteins are immobilized in plastic wells, and the diluted blood serum samples are added to these immobilized proteins. The IgG antibodies bound to the proteins are detected using a color reaction. </p>
    <h4 style="margin-bottom: 10px;text-decoration: underline;">Results interpretation</h4>
    <p> The signal from the blood serum sample is compared to the signals from control antibodies (threshold controls) targeting RBD and N. The test result is POSITIVE if signals specific to both RBD and N are higher than the signals from the corresponding thresholds. The test result is NEGATIVE if the signals specific to RBD and/or N are lower than the signals from their thresholds. The case when the signal from RBD is above the threshold, and the signal from N is below threshold might indicate a brief exposure to the virus. In this case, it is recommended to repeat the test in 4-6 weeks to confirm the presence of antibodies targeting RBD and persistence of the adaptive immune response. </p>
    <img style="float: left; margin-right: 5px;" width="240" src="https://parser3.virintel-portal.com/img/{{$vale['patient_id']}}.png"/>
    <p> The chart shows the test results normalized to (divided by) the thresholds. Both thresholds in this case equal 1. If
        the bars showing the normalized test results for RBD and/or N are below the threshold <span style="font-size: 10px;font-family: 'DejaVu Sans';">(&lt;1)</span>
        , the overall test result is NEGATIVE. If the bars showing the normalized signals for RBD and N are above the
        threshold <span style="font-size: 10px;font-family: 'DejaVu Sans';">(&#8805;1)</span>, the overall test result is POSITIVE. Negative and positive controls are provided for your reference.
        The negative controls have no blood serum added. The positive controls have high amounts of antibodies targeting RBD
        and N. </p>
    <p> At this time, it is unknown for how long antibodies persist following infection and if the presence of antibodies
        confers protective immunity. This test provides the qualitative results only. The test results should not be used
        for diagnosis of COVID-19 infection. The sensitivity of VirIntel COVID-19 Antibody Test early after infection is
        unknown. Negative results do not preclude acute SARS-CoV-2 infection. If acute infection is suspected, direct
        testing for SARS-CoV-2 is necessary. False positive results for VirIntel COVID-19 Antibody Test may occur due to
        cross-reactivity from pre-existing antibodies or other possible causes. VirIntel, LLC notified the FDA about the
        intent to distribute the VIRINTEL COVID-19 ANTIBODY TEST. The notification has been acknowledged; the test is
        currently in a queue for substantive review by FDA. </p>
</section>

<div style="page-break-after: always;"></div>

<section style="position: relative; font-size: 13px">
    <img width="700" src="https://parser3.virintel-portal.com/header.png" />
    <div style="columns: 250px 2;column-gap: 2.5em;">
        <p> This General Fact Sheet informs you of the significant known and potential risks and benefits of the emergency use of the VirIntel COVID-19 Antibody Test. For a list of the tests being referenced in this Fact Sheet, see <a href="https://www.fda.gov/media/137471/download"> https://www.fda.gov/media/137471/download</a> </p>
        <p> The VirIntel COVID-19 Antibody Test is authorized for the detection of antibodies to SARS-CoV-2 in human serum. </p>
        <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-bottom: 5px;">
        <p style="font-weight: bold;margin: 5px;"> All individuals whose specimens are tested with one of these tests will receive the Fact Sheet for Recipients: Emergency Use of SARS-CoV-2 Antibody Tests. </p>
        <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-bottom: 5px;">
        <p><span style="font-weight: bold;">What are the symptoms of COVID-19?</span> Many individuals with confirmed COVID-19 have developed fever and/or symptoms of acute respiratory illness (e.g., cough, fever, difficulty breathing). The current information available to characterize the spectrum of clinical illness associated with COVID-19 suggests that symptoms include cough, shortness of breath or difficulty breathing, fever, chills, muscle pain, headache, sore throat or new loss of taste or smell. Based on what is known about the virus that causes COVID-19, signs and symptoms may appear any time from 2 to 14 days after exposure to the virus. Based on preliminary data, the median incubation period is approximately 5 days, but may range 2-14 days. </p>
        <p> Public health officials have identified cases of COVID-19 infection throughout the world, including the United States, which poses risks to public health. Please check the CDC webpage for the most up-to-date information. </p>
        <h4 style="margin-bottom: 0;font-weight: bold;">What do I need to know about COVID-19 antibody testing?</h4>
        <p> Current information on COVID-19 for healthcare providers is available at CDC’s webpage, <i>Information for Healthcare Professionals</i> (see links provided in “Where can I go for updates and more information” section). </p>
        <ul style="margin-left: 25px;margin-bottom: 5px;">
            <li>VirIntel COVID-19 Antibody Test can be ordered byhealthcare providers to test human serum to detect ifthere has been an adaptive immune response to COVID-19, indicating recent or prior infection. </li>
            <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-bottom: 5px;">
            <p style="font-weight: bold;"> This test detects human SARS-CoV-2 antibodies that are generated as part of the human adaptive immune response to the COVID-19 virus and is to be performed only on serum specimens </p>
            <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-bottom: 5px;">
            <li>VirIntel COVID-19 Antibody Test should not be used todiagnose or exclude acute infection and should not be usedas the sole basis for treatment or patient managementdecisions. Direct testing for SARS-CoV-2 should beperformed if acute infection is suspected. </li>
            <li>VirIntel COVID-19 Antibody Test are authorized foruse in laboratories certified under the ClinicalLaboratory Improvement Amendments of 1988(CLIA), 42 U.S.C. §263a, to perform moderate orhigh complexity tests. </li>
            <li>Please refer to the VirIntel COVID-19 Antibody Testinstructions for use for additional information.</li>
        </ul>
        <p> Specimens should be collected with appropriate infection control precautions. Current guidance for COVID-19 infection control precautions are available at the CDC’s website (see links provided in “Where can I go for updates and more information” section). </p>
        <p> Use appropriate personal protective equipment when collecting and handling specimens from individuals suspected of having COVID-19 as outlined in the CDC <i>Interim Laboratory Biosafety Guidelines for Handling and Processing Specimens Associated with Coronavirus Disease 2019 (COVID-19)</i>. For additional information, refer to CDC <i>Interim Guidelines for Collecting, Handling, and Testing Clinical Specimens from Persons Under Investigation (PUIs) for Coronavirus Disease 2019 (COVID-19)</i> (see links provided in “Where can I go for updates and more information” section). </p>
        <p> There are no approved available alternative tests. FDA has issued EUAs for other antibody tests that can be found at <a href="https://www.fda.gov/emergency-preparedness-and-response/mcm-legal-regulatory-and-policy-framework/emergency-use-authorization#2019-ncov"> https://www.fda.gov/emergency-preparedness-and-response/mcm-legal-regulatory-and-policy-</a> </p>
    </div>
    <p style="margin-top: 30px;text-align: center;position: absolute; bottom: 20px; border-top: 2px solid silver"> <strong>Report Adverse events</strong>, including problems with test performance or results, to MedWatch by submitting the online FDA Form 3500 (<a href="https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home"> https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home</a>) or by calling <strong>1-800-FDA-1088</strong> </p>
</section>

<div style="page-break-after: always;"></div>

<section style="font-size: 13px;position: relative;">
    <img width="700" src="https://parser3.virintel-portal.com/header.png" />
    <article style="column-count: 2;column-gap: 2.5em;column-width: 300px;"> <a href="https://www.fda.gov/emergency-preparedness-and-response/mcm-legal-regulatory-and-policy-framework/emergency-use-authorization#2019-ncov">framework/emergency-use-authorization#2019-ncov.</a>
        <p> <span style="font-weight: bold;">What does it mean if the specimen tests positive for antibodies against the virus that causes COVID-19?</span> <br>A positive test result with the VirIntel COVID-19 Antibody Test indicates that antibodies to SARS-CoV-2 were detected, and the individual has potentially been exposed to COVID-19. </p>
        <p> Antibodies to SARS-CoV-2 are generally detectable in blood several days after initial infection. Individuals may have detectable virus present for several weeks following seroconversion. If IgG antibodies are present, it often indicates a past infection but does not exclude recently infected patients who are still contagious. <i style="font-weight: bold;"> It is unknown how long antibodies to SARS-CoV-2 will remain present in the body after infection and it is not known if they confer immunity to infection. Incorrect assumptions of immunity may lead to premature discontinuation of physical distancing requirements and increase the risk of infection for individuals, their households and the public.</i> </p>
        <p> False positive results may occur due to cross-reactivity from pre-existing antibodies or other possible causes. VirIntel COVID-19 Antibody Test has been designed to minimize the likelihood of false positive test results. However, in the event of a false positive result, risks to the patient include the following: risk of infection by exposure to persons with active COVID-19. If a recent infection is suspected a false positive result may lead to a recommendation for isolation of the patient, monitoring of household or other close contacts for symptoms, patient isolation that might limit contact with family or friends and may increase contact with other potentially COVID-19-infected patients, limits in the ability to work, or other unintended adverse effects. <i style="font-weight: bold;">Due to the risk of false positive results, confirmation of positive results should be considered – using a second, different antibody assay that detects the same type of antibodies.</i> </p>
        <p> Laboratory test results should always be considered in the context of clinical observations and epidemiological data in making patient management decisions. </p>
        <p> All laboratories using this test must follow standard confirmatory testing and reporting guidelines according to their appropriate public health authorities </p>
        <p> <strong> What does it mean if the specimen tests negative for antibodies against virus that causes COVID-19?</strong> <br>A negative test result with this test means that SARSCoV-2 specific antibodies were not present in the specimen above the limit of detection. <i style="font-weight: bold;">However, patients tested early after infection may not have detectable antibodies despite active infection; in addition, it is not certain that all infected patients will develop a detectable antibody response to SARSCoV-2 infection. A negative result should not be used to rule out infection. Direct testing of SARS-CoV-2 should be performed if acute infection is suspected.</i> </p>
        <p> The absolute sensitivity of the the SARS-CoV-2 antibody test is unknown. </p>
        <p> Risks to a patient of a false negative result include: restriction of activities deemed acceptable for patients with evidence of an antibody response to SARS-CoV-2, lack of monitoring of infected individuals and their household or other close contacts for symptoms resulting in increased risk of spread of COVID-19 within the community, or other unintended adverse events </p>
        <p> <strong> What is an EUA?</strong> <br>The United States (U.S.) FDA has made these tests available under an emergency access mechanism called an Emergency Use Authorization (EUA). The EUA is supported by the Secretary of Health and Human Service’s (HHS’s) declaration that circumstances exist to justify the emergency use of in vitro diagnostics (IVDs) for the detection and/or diagnosis of the virus that causes COVID-19. </p>
        <p> An IVD made available under an EUA has not undergone the same type of review as an FDA-approved or cleared IVD. FDA may issue an EUA when certain criteria are met, which includes that there are no adequate, approved, available alternatives, and based on the totality of scientific evidence available, it is reasonable to believe that this IVD may be effective. </p>
        <p> The EUA for the test you received is in effect for the duration of the COVID-19 declaration justifying emergency use of IVDs, unless terminated or revoked (after which the test may no longer be used). </p>
    </article>
    <p style="margin-top: 30px;text-align: center;position: absolute; bottom: 0; border-top: 2px solid silver"> <strong>Report Adverse events</strong>, including problems with test performance or results, to MedWatch by submitting the online FDA Form 3500 (<a href="https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home"> https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home</a>) or by calling <strong>1-800-FDA-1088</strong> </p>
</section>

<div style="page-break-after: always;"></div>

<section style="font-size: 13px;position: relative;">
    <img width="700" src="https://parser3.virintel-portal.com/header.png" />
    <article style="column-count: 2;column-gap: 2.5em;column-width: 300px;padding-bottom: 35%; width: 50%;">
        <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-top:10px;margin-bottom: 5px;">
        <h4 style="padding: 0;margin-bottom: 10px;">Where can I go for updates and more information?</h4>
        <h4 style="text-decoration: underline;margin: 0;padding: 0;font-size: 18px">CDC webpages:</h4>
        <p style="margin: 0;padding: 0;"> <strong>General:</strong><a href="https://www.cdc.gov/COVID19">https://www.cdc.gov/COVID19</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>Healthcare Professionals:</strong> <a href="https://www.cdc.gov/coronavirus/2019-nCoV/guidance-hcp.html">https://www.cdc.gov/coronavirus/2019-nCoV/guidance-hcp.html</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>Information for Laboratories:</strong><a href="Information for Laboratories: https://www.cdc.gov/coronavirus/2019- nCoV/guidance-laboratories.html">Information for Laboratories: https://www.cdc.gov/coronavirus/2019- nCoV/guidance-laboratories.html</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>Laboratory Biosafety:</strong><a href="https://www.cdc.gov/coronavirus/2019- nCoV/lab-biosafety-guidelines.html">https://www.cdc.gov/coronavirus/2019- nCoV/lab-biosafety-guidelines.html</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>Isolation Precautions in Healthcare Settings:</strong><a href="https://www.cdc.gov/coronavirus/2019-ncov/infection-control/control- recommendations.html">https://www.cdc.gov/coronavirus/2019-ncov/infection-control/control- recommendations.html</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>Specimen Collection:</strong><a href="https://www.cdc.gov/coronavirus/2019- nCoV/guidelines-clinical-specimens.html">https://www.cdc.gov/coronavirus/2019- nCoV/guidelines-clinical-specimens.html</a> </p>
        <p style="margin-bottom: 10px;padding: 0;"> <strong>Infection Control:</strong><a href="https://www.cdc.gov/coronavirus/2019- ncov/infection-control/index.html">https://www.cdc.gov/coronavirus/2019- ncov/infection-control/index.html</a> </p>
        <h4 style="text-decoration: underline;padding: 0;margin: 0;font-size: 18px">FDA webpages:</h4>
        <p style="margin: 0;padding: 0;"> <strong>General:</strong> <a href="www.fda.gov/novelcoronavirus">www.fda.gov/novelcoronavirus</a> </p>
        <p style="margin: 0;padding: 0;"> <strong>EUAs:</strong>(includes links to recipient fact sheet and manufacturer’s instructions)<a href="https://www.fda.gov/medical-devices/emergency-situations-medical-devices/emergency-use-authorizations">https://www.fda.gov/medical-devices/emergency-situations-medical-devices/emergency-use-authorizations</a> </p>
        <h5 style="text-decoration: underline;margin-top: 15px;">Manufacturer Contact Information:</h5>
        <p style="padding: 0;margin-bottom: 20px;margin-top:0;"> Contact information for the manufacturer that developed the SARS-CoV-2 antibody test must be provided to the Authorized Laboratories performing the test and to healthcare providers receiving this fact sheet. </p>
        <hr style="color: #77aee6;border-width: 3px;border-style: solid;background-color: #77aee6;margin-bottom: 5px;">
    </article>
    <p style="text-align: center; border-top: 2px solid silver"> <strong>Report Adverse events</strong>, including problems with test performance or results, to MedWatch by submitting the online FDA Form 3500 (<a href="https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home"> https://www.accessdata.fda.gov/scripts/medwatch/index.cfm?action=reporting.home</a>) or by calling <strong>1-800-FDA-1088</strong> </p>
</section>
</body>

</html>
