<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Student Grades</h3>
            <button type="button" class="close" wire:click="closeStudentSubjectGradeForm" id="button-reset">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <span><h2>{{ $this->student_name }}</h2></span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
                <div style="line-height: 50%;">
                    <p>Grade:<strong>{{ $this->grade }}</strong></p>
                    <p>Section:<strong>{{ $this->section }}</strong></p>
                    <p>School Year:<strong>{{ $this->schoolyear }}</strong></p>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>1st Quarter</th>
                            <th>2nd Quarter</th>
                            <th>3rd Quarter</th>
                            <th>4th Quarter</th>
                            <th>Final Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderProducts as $index => $orderProducts)
                            <tr>
                                <td>{{ $orderProducts['subject_name'] }}</td>
                                <td>
                                    <input wire:ignore.self wire:model="orderProducts.{{$index}}.first_quarter" type="number" class="form-control" id="section" style="width: 5rem" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </td>
                                <td>
                                    <input wire:ignore.self wire:model="orderProducts.{{$index}}.second_quarter" type="number" class="form-control" id="section" style="width: 5rem" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </td>
                                <td>
                                    <input wire:ignore.self wire:model="orderProducts.{{$index}}.third_quarter" type="number" class="form-control" id="section" style="width: 5rem" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </td>
                                <td>
                                    <input wire:ignore.self wire:model="orderProducts.{{$index}}.fourth_quarter" type="number" class="form-control" id="section" style="width: 5rem" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </td>
                                <td>
                                    @if($orderProducts['first_quarter']!=null&&$orderProducts['second_quarter']!=null&&$orderProducts['third_quarter']!=null&&$orderProducts['fourth_quarter']!=null)
                                        <?php
                                            echo $this->result=($orderProducts['first_quarter']+$orderProducts['second_quarter']+$orderProducts['third_quarter']+$orderProducts['fourth_quarter'])/4;
                                            $this->average+=$this->result=($orderProducts['first_quarter']+$orderProducts['second_quarter']+$orderProducts['third_quarter']+$orderProducts['fourth_quarter'])/4;
                                        ?> 
                                    @endif
                                </td>
                                <td>
                                    @if($orderProducts['first_quarter']!=null&&$orderProducts['second_quarter']!=null&&$orderProducts['third_quarter']!=null&&$orderProducts['fourth_quarter']!=null)
                                        @if($this->result>=75)
                                            {{ 'Passed' }}
                                        @endif
                                        @if($this->result<75)
                                            {{ 'Failed' }}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align: right">General Average:</th>
                            <th>
                                @if($this->total_subject!=0)
                                    {{ number_format($this->average/$this->total_subject, 2) }}
                                @endif
                            </th>
                            <th>
                                @if($this->total_subject!=0)
                                    @if($this->average/$this->total_subject>=75)
                                    {{ 'Passed' }}
                                    @endif
                                    @if($this->average/$this->total_subject<75)
                                        {{ 'Failed' }}
                                    @endif
                                @endif
                                <?php
                                    $this->average=0;
                                ?>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeStudentSubjectGradeForm">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>