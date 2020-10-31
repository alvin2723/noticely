<div>
    <div class="card rounded shadow" style="margin-right:22%">
        <div class="card-body p-5">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title Minute of Meeting:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title_mom">
                    @error('title_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Date Minute of Meeting:</label>
                    <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="12/07/2020" wire:model="date_mom" value="date_mom">
                    @error('date_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="exampleFormControlInput3">Start:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput3" placeholder="08:00" wire:model="start_mom">
                        @error('start_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col">
                        <label for="exampleFormControlInput4">End:</label>
                        <input type="time" class="form-control" id="exampleFormControlInput4" placeholder="08:00" wire:model="end_mom">
                        @error('end_mom') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput5">Objective of Minute of Meeting:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput5" wire:model="objective_mom" placeholder="Enter Objective..."></textarea>
                        @error('objective_mom') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput6">Decision Made:</label>
                    <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="decision_made" placeholder="Enter Decision..."></textarea>
                        @error('decision_made') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput6">Attendees:</label><br>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">1. What is HTML?</button>									
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" wire:model="attendees.data">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Default checkbox
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1" wire:model="attendees.saa">
                                        <label class="form-check-label" for="defaultCheck1">
                                          Default checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">2. What is Bootstrap?</button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Bootstrap is a sleek, intuitive, and powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. <a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank">Learn more.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">3. What is CSS?</button>                     
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc. <a href="https://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn more.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    {{-- <textarea type="text" class="form-control" id="exampleFormControlInput6" wire:model="attendees" placeholder="Enter Decision..."></textarea> --}}
                </div> 
                
                <button wire:click.prevent="store()" class="btn btn-success">Create</button>
            </form>
            
        </div>
    </div>
</div>
