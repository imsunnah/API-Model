<?php
// Note: This is a test controller file
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    public function __construct()
    {

    }

    // Add this annotation to the controller if filtering is enabled

    /**
     * Get a list of customers with optional filters.
     */

    public function index(): AnonymousResourceCollection
    {
        $customers = Customer::useFilters()->dynamicPaginate();

        return CustomerResource::collection($customers);
    }

    public function store(CreateCustomerRequest $request): JsonResponse
    {
        $customer = Customer::create($request->validated());

        return $this->responseCreated('Customer created successfully', new CustomerResource($customer));
    }

    public function show(Customer $customer): JsonResponse
    {
        return $this->responseSuccess(null, new CustomerResource($customer));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $customer->update($request->validated());

        return $this->responseSuccess('Customer updated Successfully', new CustomerResource($customer));
    }

    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();

        return $this->responseDeleted();
    }
    

    
}