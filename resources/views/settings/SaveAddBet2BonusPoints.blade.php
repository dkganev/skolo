
                                    <tr id="row{{$game->id}}">
                                        <td class="text-center">
                                            <span id="td1{{$game->id}}" >{{$game->name}} </span>
                                            <input id="name{{$game->id}}" class="form-control input-sm " value="{{$game->name}}" name="bonus_silver_money" maxlength="7" required="" numbers-only="" style="display: none;" tabindex="0" aria-required="false" aria-invalid="false" type="text">
                                        </td>
                                        <td class="text-right">
                                            <span id="td2{{$game->id}}" class="row{{$game->id}}">{{$game->bronze_money_for_bonus_point}}</span>
                                            <input id="bronze_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->bronze_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td3{{$game->id}}" class="row{{$game->id}}">{{$game->gold_money_for_bonus_point}}</span>
                                            <input id="gold_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->gold_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-right">
                                            <span id="td4{{$game->id}}" class="row{{$game->id}}">{{$game->platinum_money_for_bonus_point}}</span>
                                            <input id="platinum_money_for_bonus_point{{$game->id}}" class="form-control input-sm rowInput{{$game->id}}" value="{{$game->platinum_money_for_bonus_point}}" name="bonus_silver_money" maxlength="5" required="" numbers-only="" style="display:none;" tabindex="0" aria-required="false" aria-invalid="false" type="number" >
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-xs row{{$game->id}}" type="button" onclick="EditBet2BonusPoints({{$game->id}})" tabindex="0">
                                                <span id="refreshEdit{{$game->id}}" class="glyphicon glyphicon-refresh icon-spinner icon-submit " style="display: none;"></span>
                                                <span id="OKEdit{{$game->id}}" class="glyphicon glyphicon-ok icon-result icon-success "  style="display: none;"></span>
                                                <span id="removeEdit{{$game->id}}" class="glyphicon glyphicon-remove icon-result icon-error"  style="display: none;"></span>
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$game->id}}" type="button" onclick="SaveBet2BonusPoints({{$game->id}})" style="display: none;" tabindex="0">
                                                Save
                                            </button>
                                            <button class="btn btn-primary btn-xs rowInput{{$game->id}}" type="button" onclick="RemoveBet2BonusPoints({{$game->id}})" style="display: none; margin-top: 5px" tabindex="0">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
