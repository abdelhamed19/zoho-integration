<?php

namespace App\Http\Controllers;

use App\Services\CallZohoEndPoint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ZohoInvoiceController extends Controller
{
    private $callZohoEndPoint;
    public function __construct(CallZohoEndPoint $callZohoEndPoint)
    {
        $this->callZohoEndPoint = $callZohoEndPoint;
    }
    public function getOrganizationId()
    {
        return $this->callZohoEndPoint->getRequest('organizations')['organizations'][0]['organization_id'];
    }
    public function getAllInvoices()
    {
        $invoices = $this->callZohoEndPoint->getRequest('invoices?' . 'organization_id=' . $this->getOrganizationId());
        return $invoices;
    }
    public function getInvoice($id)
    {
        return $this->callZohoEndPoint->getRequest('invoices/'.$id. '?organization_id=' . $this->getOrganizationId());
    }
    public function createInvoice(Request $request)
    {
        $invoiceData = [
            'customer_id' => 5617530000000094005,
            "contact_persons"=> [
                "01275605862"
            ],
            "line_items" => [
                [
                    "item_id" => 100,
                    'description' => $request->description,
                    'quantity' => $request->quantity,
                    'rate' => $request->rate,
                    'tax' => $request->tax,
                    'amount' => $request->amount,
                    'tax_percentage' => $request->tax_percentage,
                ]
            ]
        ];
        return $this->callZohoEndPoint->postRequest('invoices?' . 'organization_id=' . $this->getOrganizationId(), $invoiceData);
    }
    public function updateInvoice(Request $request,$id)
    {
        $invoiceData = [
            'customer_id' => 867788619,
            "contact_persons"=> [
                "982000000870911",
                "982000000870915"
            ],
            "line_items" => [
                [
                    "item_id" => 12555,
                    'description' => 'sasasas',
                    'quantity' => 1,
                    'rate' => 1200,
                    'tax' => 50,
                    'amount' => 1,
                    'tax_percentage' => 50,
                ]
            ]
        ];
        //invoices/982000000567114?organization_id=10234695
        return $this->callZohoEndPoint->putRequest('invoices/'.$id . '?organization_id=' . $this->getOrganizationId(), $invoiceData);
    }

}
