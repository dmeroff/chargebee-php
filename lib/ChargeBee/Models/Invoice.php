<?php

class ChargeBee_Invoice extends ChargeBee_Model
{

  protected $allowed = array('id', 'poNumber', 'customerId', 'subscriptionId', 'recurring', 'status', 'vatNumber',
'startDate', 'endDate', 'amount', 'amountDue', 'paidOn', 'nextRetry', 'subTotal', 'tax', 'lineItems','discounts', 'taxes', 'linkedTransactions', 'linkedOrders', 'notes', 'shippingAddress', 'billingAddress');



  # OPERATIONS
  #-----------

  public static function create($params, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices"), $params, $env);
  }

  public static function charge($params, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices","charge"), $params, $env);
  }

  public static function chargeAddon($params, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices","charge_addon"), $params, $env);
  }

  public static function all($params = array(), $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath("invoices"), $params, $env);
  }

  public static function invoicesForCustomer($id, $params = array(), $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath("customers",$id,"invoices"), $params, $env);
  }

  public static function invoicesForSubscription($id, $params = array(), $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath("subscriptions",$id,"invoices"), $params, $env);
  }

  public static function retrieve($id, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::GET, ChargeBee_Util::encodeURIPath("invoices",$id), array(), $env);
  }

  public static function pdf($id, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"pdf"), array(), $env);
  }

  public static function addCharge($id, $params, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"add_charge"), $params, $env);
  }

  public static function addAddonCharge($id, $params, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"add_addon_charge"), $params, $env);
  }

  public static function collect($id, $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"collect"), array(), $env);
  }

  public static function refund($id, $params = array(), $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"refund"), $params, $env);
  }

  public static function delete($id, $params = array(), $env = null)
  {
    return ChargeBee_Request::send(ChargeBee_Request::POST, ChargeBee_Util::encodeURIPath("invoices",$id,"delete"), $params, $env);
  }

 }

?>