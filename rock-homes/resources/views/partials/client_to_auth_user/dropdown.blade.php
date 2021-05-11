<select id="{{ $field ?? 'clientid' }}" name="{{ $field ?? 'clientid' }}" class="form-control custom-select" required>
  <option value="">---select---</option>
    @foreach ($clients as $key => $client)
      <?php $client_fullname = ucwords( ($client->client_name)) ?>
      <option value="{{ $client->id }}" class="text-capitalize">
      {{ !empty($client_fullname) ? $client_fullname : "" }}
      </option>
    @endforeach
</select>