@extends('admin.layout')

@section('Title')
    Edit Financial
@endsection

@section('Body')
    <h1 class="text-center text-dark mb-5">Edit {{ $manager->yearMonth }} week {{ $manager->week }} Financial</h1>
    <div class="container">
        <div class="mt-5 mb-3">
            <form action="{{ route('updateManagerAccount', "$manager->id") }}" method="post">
                @csrf
                @method('PUT')
                <div class="addManagersAccount mb-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Month & Year</th>
                                <th>Week</th>
                                <th>Yuan</th>
                                <th>Currency rate</th>
                                <th>EGP Amount</th>
                                <th>Salarys</th>
                                <th>Expenses</th>
                                <th>Expenses reasons</th>
                                <th>The rest</th>
                                <th>Amr</th>
                                <th>Khaled</th>
                                <th>Mostafa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="date" name="yearMonth" class="form-control form-control-user"
                                        value="{{ $manager->yearMonth }}" id="yearMonth" required>
                                    @error('yearMonth')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <select name="week" id="week" class="custom-select">
                                        <option value="{{ $manager->week }}" hidden>Week
                                            {{ $manager->week }}</option>
                                        <option value="1">Week 1</option>
                                        <option value="2">Week 2</option>
                                        <option value="3">Week 3</option>
                                        <option value="4">Week 4</option>
                                    </select>
                                    @error('week')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="yuan"
                                        class="form-control form-control-user numeric-input" id="yuan"
                                        value="{{ $manager->yuan }}" step="any" required>
                                    @error('yuan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="currency"
                                        class="form-control form-control-user numeric-input" id="currency"
                                        value="{{ $manager->currency }}" step="any" required>
                                    @error('currency')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="amount"
                                        class="form-control form-control-user numeric-input" id="amount"
                                        value="{{ $manager->amount }}" step="any" required readonly>
                                    @error('amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="salary"
                                        class="form-control form-control-user numeric-input" id="salary"
                                        value="{{ $manager->salary }}" step="any" required>
                                    @error('salary')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="expenses" class="form-control form-control-user"
                                        id="expenses" value="{{ $manager->expenses }}" step="any">
                                    @error('expenses')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" name="reason" class="form-control form-control-user"
                                        value="{{ $manager->reason }}" id="reason">
                                    @error('reason')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="rest"
                                        class="form-control form-control-user numeric-input" id="rest"
                                        value="{{ $manager->rest }}" step="any" required readonly>
                                    @error('rest')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="amr"
                                        class="form-control form-control-user numeric-input" id="amr"
                                        value="{{ $manager->amr }}" step="any" required readonly>
                                    @error('amr')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="khaled"
                                        class="form-control form-control-user numeric-input" id="khaled"
                                        value="{{ $manager->khaled }}" step="any" required readonly>
                                    @error('khaled')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="mostafa"
                                        class="form-control form-control-user numeric-input" id="mostafa"
                                        value="{{ $manager->mostafa }}" step="any" required readonly>
                                    @error('mostafa')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-success w-25">Update</button>
            </form>
        </div>
    </div>
@endsection
