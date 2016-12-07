<tr class="tr-class" id="row{{$val->id}}">
                                        <td class="text-center" style="vertical-align: bottom;">
                                            <span id="CartIDText{{$val->id}}" class="row{{$val->id}}">{{$val->card_id}} </span>
                                            <span id="errorAdd{{$val->id}}" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddT{{$val->id}}" style="color: #d9534f; display: none;"> This Card ID: <span id="CartIDExist">111</span> exist in the database.</span> 
                                            <span id="errorAddI{{$val->id}}" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartID{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->card_id}}" placeholder="Cart ID" name="CartID" readonly="" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                            <button class="form-control btn btn-primary btn-xs rowInput{{$val->id}}" type="button" onclick="ReadNewCard2({{$val->id}})" style="display: none;" tabindex="0">
                                                <span id="refreshRNC{{$val->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC{{$val->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        
                                        </td>
                                        <td class="text-center">
                                            <span id="nameText{{$val->id}}" class="row{{$val->id}}">{{$val->name}} </span>
                                            <span id="errorAddUser{{$val->id}}" style="color: #d9534f; display: none;"> Enter username, please.</span> 
                                            <input id="name{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->name}}" placeholder="Player Name" name="name" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                            <input id="userAddress{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->address}}" name="userAddress" placeholder="Player Address" required="" numbers-only="" style="display:none; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                            <input id="userPhone{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->phone}}" name="userPhone" placeholder="Player Phone" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="text" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td2{{$val->id}}" class="row{{$val->id}}">bronze</span>
                                            <!--<select id="type{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" disabled=""  style="display:none !important;">
                                                <option value="bronze" {{$val->level == "bronze" ? "selected" : ""}}>Bronze</option>
                                                <option value="gold" {{$val->level == "gold" ? "selected" : ""}}>Gold</option>
                                                <option value="platinum" {{$val->level == "platinum" ? "selected" : ""}}>Platinum</option>
                                            </select> -->
                                        </td>
                                        <td class="text-right" style="vertical-align: bottom;">
                                            <span id="cashInText{{$val->id}}" class="row{{$val->id}}">{{$val->deposit}}</span>
                                            <input id="cashIn{{$val->id}}" class="form-control input-sm rowInput{{$val->id}}" value="{{$val->deposit}}" name="cashIn" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="BankCredit{{$val->id}}" class="row{{$val->id}}">{{$val->bank_credit}}</span>
                                        </td>
                                        <td class="text-right">
                                            <span id="td6{{$val->id}}" class="row{{$val->id}}">{{$val->bonus_points}}</span>
                                        </td>
                                        <td class="text-center" style="vertical-align: inherit;">
                                            <button class="btn btn-primary btn-xs row{{$val->id}}" type="button" onclick="EditCart({{$val->id}})" tabindex="0" style="width: 31%;">
                                                <span id="refreshEdit{{$val->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKEdit{{$val->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="remove1Edit{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-default btn-xs row{{$val->id}}" type="button" onclick="TransactionsCart({{$val->id}})" tabindex="0"  style="width: 67%;">
                                                Transactions
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$val->id}} form-control" type="button" onclick="SaveEditCart({{$val->id}})" style="display: none;" tabindex="0">
                                                <span id="removeEdit{{$val->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Save
                                            </button>
                                            <button class="btn btn-primary btn-xs row2Input{{$val->id}}" type="button" onclick="RemoveBet2BonusPoints({{$val->id}})" style="display: none; margin-top: 0px" tabindex="0">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>