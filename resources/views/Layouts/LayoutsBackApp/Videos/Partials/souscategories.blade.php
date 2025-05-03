<label class="col-form-label" for="inputSuccess">Sous-catégories associées<span style="color:red;">*</span></label>
<select name="souscategories" id="souscategories" class="form-control"
data-placeholder="--Sous catégories--" style="width: 100%;">
<option value="" style="text-align: center">--Sous catégories--</option>
    @foreach ($souscategories as $souscategories_items)
    <option value="{{ $souscategories_items['souscategories']->id }}" style="text-align: center">
        {{ $souscategories_items['souscategories']->name }}
    </option>
    @endforeach
</select>
