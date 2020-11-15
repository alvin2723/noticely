<div>
   
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Send </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Number" wire:model="number">
          
        </div>
        <button wire:click="sendSMS()" class="btn btn-success">Create</button>
    </form>
</div>
