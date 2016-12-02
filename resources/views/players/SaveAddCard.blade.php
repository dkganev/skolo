
                                    <tr id="row{{$user_info->id}}">
                                        <td class="text-center">
                                            <span id="td1{{$user_info->id}}" >{{$user_info->name}} </span>
                                            <span id="errorAdd" style="color: #d9534f; display: none;"> Read the card, please.</span> 
                                            <span id="errorAddT" style="color: #d9534f; display: none;"> This Card ID: <span id="CartITExist">111</span> exist in the database.</span> 
                                            <span id="errorAddI" style="color: #d9534f; display: none;"> Insert the card, please.</span> 
                                            <input id="CartIDAdd" class="form-control input-sm rowInputAdd" value="" name="CartIDAdd" maxlength="5" required="" numbers-only="" style="display:none; margin-bottom: 3px;" tabindex="0" aria-required="false" aria-invalid="false" type="text" readonly>
                                            <button class="form-control btn btn-primary btn-xs rowInputAdd" type="button" onclick="ReadNewCard()" style="display: show;" tabindex="0">
                                                <span id="refreshRNC" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKRNC" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeRNC" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                Read New Card
                                            </button>
                                        </td>
                                        <td class="text-right">
                                            <span id="td2{{$user_info->id}}" class="row{{$user_info->id}}">{{$user_info->id}}</span>
                                            <input id="bronze_money_for_bonus_point{{$user_info->id}}" class="form-control input-sm rowInput{{$user_info->id}}" value="{{$user_info->id}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td3{{$user_info->id}}" class="row{{$user_info->id}}">{{$user_info->id}}</span>
                                            <input id="gold_money_for_bonus_point{{$user_info->id}}" class="form-control input-sm rowInput{{$user_info->id}}" value="{{$user_info->id}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td4{{$user_info->id}}" class="row{{$user_info->id}}">{{$user_info->id}}</span>
                                            <input id="platinum_money_for_bonus_point{{$user_info->id}}" class="form-control input-sm rowInput{{$user_info->id}}" value="{{$user_info->id}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-xs row{{$user_info->id}}" type="button" onclick="EditBet2BonusPoints({{$user_info->id}})" tabindex="0">
                                                <span id="refreshEdit{{$user_info->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKEdit{{$user_info->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeEdit{{$user_info->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$user_info->id}}" type="button" onclick="SaveBet2BonusPoints({{$user_info->id}})" style="display: none;" tabindex="0">
                                                Save
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$user_info->id}}" type="button" onclick="RemoveBet2BonusPoints({$user_info->id}})" style="display: none; margin-top: 5px" tabindex="0">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
