<div>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Class Subject</h3>
          <button type="button" class="close" wire:click="closeClassSubjectForm" id="button-reset">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.prevent="store" enctype="multipart/form-data">
          <div class="card-body">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          {{-- sample --}}
                          <table class="table" id="products_table">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th><div style="float: right;margin-right:1rem">Action</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderProducts as $index => $orderProduct)
                                <tr>
                                    <td>
                                        <select name="orderProducts[{{$index}}][subject_id]"
                                            wire:model="orderProducts.{{$index}}.subject_id"
                                            class="form-control" required>
                                            <option value="">-- Select Subject --</option>
                                            @foreach ($select_items as $product)
                                            <option 
                                            <?php 
                                                      for ($i=0; $i < count($this->orderProducts); $i++) {
                                                        if(!empty($this->orderProducts[$i]['subject_id'])){
                                                          if ($product->id == $this->orderProducts[$i]['subject_id']) {
                                                            if ($this->orderProducts[$index]['subject_id'] == $this->orderProducts[$i]['subject_id']) {
                                                            // echo "none";
                                                            } else {
                                                            echo "disabled";
                                                            }
                                                          }
                                                        }
                                                      }
                                                ?> value="{{ $product->id }}">{{ $product->subject_name }}<?php 
                                                      for ($i=0; $i < count($this->orderProducts); $i++) {
                                                        if(!empty($this->orderProducts[$i]['subject_id'])){
                                                          if ($product->id == $this->orderProducts[$i]['subject_id']) {
                                                            if ($this->orderProducts[$index]['subject_id'] == $this->orderProducts[$i]['subject_id']) {
                                                            // echo "none";
                                                            } else {
                                                              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You Already taken.";
                                                            }
                                                          }
                                                        }
                                                      }
                                                ?></option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div style="float: right">
                                            <button wire:click.prevent="removeProduct({{$index}})" class="py-0 btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-primary" wire:click.prevent="addProduct">+ Add Subject</button>
                            </div>
                        </div>
                          {{-- end sample --}}
                      </div>
                  </div>
              </div>
            
            
            
            
          </div>
          <!-- /.card-body -->
  
          
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeClassSubjectForm">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
  </div>