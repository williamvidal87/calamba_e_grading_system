<div>
    <style>
        *{
            font-size: 10pt;
            font-family: Arial, Helvetica, sans-serif;
        }
        .column {
            float: left;
            padding: 10px;
        }
        
        .left, .right {
            width: 25%;
        }
        
        .middle {
            width: 50%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        @page { 
            margin-top: 0.52in;
            margin-left: 0.00in;
            margin-right: 0.00in;
            margin-bottom: 0.15in;
            size: 11in 8.5in;
        }
        .row {
            display: flex;
        }
        
        /* Create two equal columns that sits next to each other */
        .column {
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }
    </style>
    <div style="width: 5.50in;position:fixed">
        <br><br><br>
        <div style="text-align: center">
            <h1 style="font-size: 12pt;">REPORT ON ATTENDANCE</h1>
            <br>
            <table style="line-height: 200%;margin-left: auto;margin-right: auto;">
                <tr style="background-color:rgb(226, 226, 226)">
                    <th style="width:9rem;font-size:9pt"></th>
                    <th style="width:1.80rem;font-size:9pt">Jun</th> 
                    <th style="width:1.80rem;font-size:9pt">Jul</th>
                    <th style="width:1.80rem;font-size:9pt">Aug</th> 
                    <th style="width:1.80rem;font-size:9pt">Sept</th>
                    <th style="width:1.80rem;font-size:9pt">Oct</th> 
                    <th style="width:1.80rem;font-size:9pt">Nov</th>
                    <th style="width:1.80rem;font-size:9pt">Dec</th> 
                    <th style="width:1.80rem;font-size:9pt">Jan</th>
                    <th style="width:1.80rem;font-size:9pt">Feb</th> 
                    <th style="width:1.80rem;font-size:9pt">Mar</th>
                    <th style="width:1.80rem;font-size:9pt">Total</th>
                </tr>
                <tr>
                    <td style="background-color:rgb(226, 226, 226);font-size:9pt">No. of School Days</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="background-color:rgb(226, 226, 226);font-size:9pt">No. of Days Present</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="background-color:rgb(226, 226, 226);font-size:9pt">No. of Days Absent</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <div style="text-align: center">
            <h1 style="font-size: 12pt">PARENT/GUARDIAN'S SIGNATURE</h1>
            <br>
            <div style="font-size: 14pt">
                <p>1<sup>st</sup> Quarter____________________________________</p>
                <p>2<sup>nd</sup> Quarter____________________________________</p>
                <p>3<sup>rd</sup> Quarter____________________________________</p>
                <p>4<sup>th</sup> Quarter____________________________________</p>
            </div>
        </div>
    </div>
    <div style="width: 5.10in;margin-left:5.50in;position:fixed;">
        <p>DepEd FORM 138</p>
        <!-- <img src="image/logo/devisionlogo.gif" alt="logo" style="width:80;height:80;position:fixed;margin-left:5.70in;margin-top:0.40in"> -->
        <div style="line-height: 30%;text-align: center">
            <p>Republic of the Philippines</p>
            <p>Department of Education</p>
            <p>Region VII, Central Visayas</p>
            <p>Division of Guihulngan City</p>
            <p><strong>CALAMBA ELEMENTARY SCHOOL</strong></p>
        </div>
        <!-- <img src="image/logo/calambalogo.gif" alt="logo" style="width:80;height:80;position:fixed;margin-left:9.40in;margin-top:0.40in"> -->
        <br><br>
        <div>
            <p style="position: fixed;margin-left:0.50in"><strong>{{ $name }}</strong></p>
            <p>Name:_____________________________________________________________</p>
            <p style="position: fixed;margin-left:0.50in"><strong>{{ $age }}</strong></p>
            <p style="position: fixed;margin-left:3in"><strong>{{ $sex }}</strong></p>
            <p>Age:______________________________ Sex:____________________________</p>
            <p style="position: fixed;margin-left:0.50in"><strong>{{ $grade }}</strong></p>
            <p style="position: fixed;margin-left:2.50in"><strong>{{ $section }}</strong></p>
            <p>Grade:___________________ Section:__________________________________</p>
            <p style="position: fixed;margin-left:1in"><strong>{{ $school_year }}</strong></p>
            <p style="position: fixed;margin-left:2.95in"><strong>{{ $lrn }}</strong></p>
            <p>School Year:______________________ LRN:_____________________________</p>
            <br>
            <div style="font-size: 30%">
                <p>Dear Parent:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values.  <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The school welcomes you should you desire to know more about your child's progress.
                </p>
            </div>
            <div style="text-align: center;margin-left:3in">
            <p style="position: fixed;margin-left:0.40in;"><strong>{{ $teacher_name }}</strong></p>
            <p>_______________________<br>Teacher</p>
            </div>
            <div style="text-align: center;width:2in">
            <p style="position: fixed;margin-left:0.40in"><strong>{{ $principal_name }}</strong></p>
            <p>_______________________<br>Principal</p>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    
    <div class="row">
        <div class="column" style="width:5.50in;text-align:center">
            <h2>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h2>
            <table style="width:90%;margin-left: auto;margin-right: auto;line-height: 200%;">
                <thead style="background-color:rgb(226, 226, 226)">
                    <tr>
                        <th rowspan="2">Learning Areas</th>
                        <th colspan="4" style="width:12em">Quarter</th> 
                        <th rowspan="2" style="width: 4em">Final Grade</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                        <th>1</th> 
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($StudentGrade as $studentgrade)
                    <tr>
                        <td>{{ $studentgrade->getClassSubjectID->getSubject->subject_name }}</td>
                        <td style="text-align: center">{{ $studentgrade->first_quarter }}</td>
                        <td style="text-align: center">{{ $studentgrade->second_quarter }}</td>
                        <td style="text-align: center">{{ $studentgrade->third_quarter }}</td>
                        <td style="text-align: center">{{ $studentgrade->fourth_quarter }}</td>
                        <td style="text-align: center">
                            @if($studentgrade->first_quarter!=null&&$studentgrade->second_quarter!=null&&$studentgrade->third_quarter!=null&&$studentgrade->fourth_quarter!=null)
                                {{ round(($studentgrade->first_quarter+$studentgrade->second_quarter+$studentgrade->third_quarter+$studentgrade->fourth_quarter)/4) }}
                            @endif
                            <?php
                                $total_subject++;
                                $total_average+=($studentgrade->first_quarter+$studentgrade->second_quarter+$studentgrade->third_quarter+$studentgrade->fourth_quarter)/4
                                
                            ?>
                        </td>
                        <td style="text-align: center">
                            @if($studentgrade->first_quarter!=null&&$studentgrade->second_quarter!=null&&$studentgrade->third_quarter!=null&&$studentgrade->fourth_quarter!=null)
                                @if(round(($studentgrade->first_quarter+$studentgrade->second_quarter+$studentgrade->third_quarter+$studentgrade->fourth_quarter)/4)>=75)
                                    {{ "Passed" }}
                                @else
                                    {{ "Failed" }}
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot style="border: none;">
                    <tr style="border: none;">
                        <td style="border: none;"></td>
                        <td style="text-align: center" colspan="4"><strong>General Average</strong></td>
                        <td style="text-align: center">{{ round($total_average/$total_subject) }}</td>
                        <td style="text-align: center">
                            @if (round($total_average/$total_subject)>=75)
                                {{"Passed"}}
                            @endif
                            @if (round($total_average/$total_subject)<75)
                                {{"Failed"}}
                            @endif
                        </td>
                    </tr>
                </tfoot>
            </table>
            <table style="width:3.50in;position:fixed;margin-top:5.50in;border: none;line-height: 200%;margin-left:1in">
                <tbody>
                    <tr>
                        <td style="border: none;"><strong>Description</strong></td>
                        <td style="border: none;"><strong>Grading-Scale</strong></td>
                        <td style="border: none;"><strong>Remarks</strong></td>
                    </tr>
                    <tr>
                        <td style="border: none;">OutStanding</td>
                        <td style="border: none;">90 - 100</td>
                        <td style="border: none;">Passed</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Very Satisfactory</td>
                        <td style="border: none;">85 - 89</td>
                        <td style="border: none;">Passed</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Fairly Satisfactory</td>
                        <td style="border: none;">75 - 79</td>
                        <td style="border: none;">Passed</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Did Not Meet Expectations</td>
                        <td style="border: none;">Below 75</td>
                        <td style="border: none;">Failed</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column" style="width:5.10in;text-align:center">
            <h2>REPORT ON LEARNER'S OBSERVED VALUE</h2>
            <table style="width:90%;margin-left: auto;margin-right: auto;line-height: 130%;">
                <thead style="background-color:rgb(226, 226, 226)">
                    <tr>
                        <th rowspan="2" style="width:8em">Core Values</th>
                        <th rowspan="2" style="width: 14em">Behavior Satatements</th>
                        <th colspan="4">Quarter</th> 
                    </tr>
                    <tr>
                        <th>1</th> 
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2">1.Maka-Diyos</td>
                        <td>
                            Expresses one's spiritual beliefs while respecting the spiritual beliefs of others
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Shows adherence to ethical principles by upholding truth</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2">2.Makatao</td>
                        <td>
                            Is sensitive to individual, social, and cultural differences
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Demonstrate contribuations toward solidarity
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.Makakalikasan</td>
                        <td>
                            Cares for the enviroment and utilizes resources wisely, judiciously, and economically
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2">4.Makabansa</td>
                        <td>
                            Demonstrates pride in being a Filipino;exercise the rights and responsibilities of a Filipino citizen
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            Demonstrates appropriate behavior in carrying out activities in the school, community, and country
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table style="width:3.50in;position:fixed;margin-top:5.50in;border: none;line-height: 200%;margin-left:1in;text-align: center">
                <tbody>
                    <tr>
                        <td style="border: none;"><strong>Marking</strong></td>
                        <td style="border: none;"><strong>Non-numerical Rating</strong></td>
                    </tr>
                    <tr>
                        <td style="border: none;">AO</td>
                        <td style="border: none;">Always Oserved - 100</td>
                    </tr>
                    <tr>
                        <td style="border: none;">SO</td>
                        <td style="border: none;">Sometimes Observe</td>
                    </tr>
                    <tr>
                        <td style="border: none;">RO</td>
                        <td style="border: none;">Rarely Observe</td>
                    </tr>
                    <tr>
                        <td style="border: none;">NO</td>
                        <td style="border: none;">Not Observe</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>