@if ($souscategories !== null)
<label class="col-form-label" for="inputSuccess">Sous-catégories<span style="color:red;">*</span></label>
<select name="souscategories" id="souscategories" class="form-control"
data-placeholder="--Sous catégories--" style="width: 100%;">
     <option value="" style="text-align: center">--Sous catégories--</option>
    @foreach ($souscategories as $souscategories_items)
    <option value="{{ $souscategories_items['souscategories']->id }}" style="text-align: center">
        {{ $souscategories_items['souscategories']->name }}
    </option>
    @endforeach
</select>
@else
<label class="col-form-label" for="inputSuccess">Sous Catégories</label>
<input type="text" id="souscategories" name="souscategories" class="form-control" style="width: 100%;" readonly placeholder="Aucune catégories">
@endif
<span class="souscategories_err error text-danger">

