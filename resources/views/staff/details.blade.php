@extends('layouts.structure')
@section('main')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <a href="{{ url('staff')}}" class="btn btn-success float-start">Back</a>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Details For {{ $user->first_name }} </h5>

              <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Basic Information
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        @if ($user)
                        <strong>
                            {{-- <p class="text-info">
                                Name: {{ $user->teacher->first_name }}
                                {{ $user->teacher->last_name ? ' ' . $user->teacher->last_name : '' }}
                                {{ $user->teacher->other_name ? ' ' . $user->teacher->other_name : '' }}
                            </p>
                            @foreach ($user->teacher->getAttributes() as $key => $value)
                                <p class="text-info"><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                            @endforeach --}}
                            <div class="container">
                                <div class="row">
                                    @foreach ($user->getAttributes() as $key => $value)
                                        @if (!in_array($key, ['created_at', 'updated_at','id','user_id']) && $value)
                                            <div class="col-md-6">
                                                <strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            
                        </strong>                        
                        @endif
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Classes Assigned 
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      {{ $user }}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
              </div><!-- End Default Accordion Example -->

            </div>
          </div>

        </div>
    </div>
</div>         
@endsection