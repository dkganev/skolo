<?php

use Illuminate\Database\Seeder;
use App\Models\PsErrorsList;
class PsErrorsListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
		[
		'err_code' => 18,
		'err_group' => 2,
		'err_text' => "Main Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 19,
		'err_group' => 2,
		'err_text' => "Service Door Open",
		'err_level' => 3,
		], [
		'err_code' => 20,
		'err_group' => 2,
		'err_text' => "Service Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 21,
		'err_group' => 2,
		'err_text' => "Card Cage Door Open",
		'err_level' => 3,
		], [
		'err_code' => 22,
		'err_group' => 2,
		'err_text' => "Card Cage Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 23,
		'err_group' => 1,
		'err_text' => "AC Power On",
		'err_level' => 1,
		], [
		'err_code' => 24,
		'err_group' => 1,
		'err_text' => "AC Power Off",
		'err_level' => 1,
		], [
		'err_code' => 25,
		'err_group' => 2,
		'err_text' => "Bill Stacker Door Open",
		'err_level' => 3,
		], [
		'err_code' => 26,
		'err_group' => 2,
		'err_text' => "Bill Stacker Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 27,
		'err_group' => 2,
		'err_text' => "Bill Stacker Removed",
		'err_level' => 3,
		], [
		'err_code' => 28,
		'err_group' => 2,
		'err_text' => "Bill Stacker Installed",
		'err_level' => 1,
		], [
		'err_code' => 29,
		'err_group' => 2,
		'err_text' => "Bill Door Open",
		'err_level' => 3,
		], [
		'err_code' => 30,
		'err_group' => 2,
		'err_text' => "Bill Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 32,
		'err_group' => 8,
		'err_text' => "General Error",
		'err_level' => 3,
		], [
		'err_code' => 39,
		'err_group' => 8,
		'err_text' => "Bill Stacker Full",
		'err_level' => 3,
		], [
		'err_code' => 40,
		'err_group' => 8,
		'err_text' => "Bill Jam",
		'err_level' => 3,
		], [
		'err_code' => 41,
		'err_group' => 8,
		'err_text' => "Bill Validator Hardware Failure",
		'err_level' => 3,
		], [
		'err_code' => 42,
		'err_group' => 8,
		'err_text' => "Reverse Bill Detected",
		'err_level' => 3,
		], [
		'err_code' => 43,
		'err_group' => 1,
		'err_text' => "Bill Rejected",
		'err_level' => 1,
		], [
		'err_code' => 44,
		'err_group' => 8,
		'err_text' => "Counterfeit Bill Detected",
		'err_level' => 3,
		], [
		'err_code' => 45,
		'err_group' => 8,
		'err_text' => "Reverse Coin In Detected",
		'err_level' => 3,
		], [
		'err_code' => 46,
		'err_group' => 8,
		'err_text' => "Cashbox Near Full Detected",
		'err_level' => 3,
		], [
		'err_code' => 50,
		'err_group' => 1,
		'err_text' => "CMOS RAM Error (no data recovered from EEPROM)",
		'err_level' => 1,
		], [
		'err_code' => 58,
		'err_group' => 1,
		'err_text' => "Memory Error Reset (operator used self test switch)",
		'err_level' => 1,
		], [
		'err_code' => 59,
		'err_group' => 8,
		'err_text' => "Low Backup Battery Detected",
		'err_level' => 3,
		], [
		'err_code' => 60,
		'err_group' => 1,
		'err_text' => "Setting Changed",
		'err_level' => 1,
		], [
		'err_code' => 61,
		'err_group' => 512,
		'err_text' => "A Cash Out Ticket Has Been Printed",
		'err_level' => 1,
		], [
		'err_code' => 62,
		'err_group' => 1,
		'err_text' => "Handpay Validated",
		'err_level' => 1,
		], [
		'err_code' => 63,
		'err_group' => 8,
		'err_text' => "Validation ID Not Configured",
		'err_level' => 3,
		], [
		'err_code' => 71,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 72,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 73,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 74,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 75,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 76,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 77,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 78,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 79,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 80,
		'err_group' => 32,
		'err_text' => "Bill Accepted",
		'err_level' => 1,
		], [
		'err_code' => 81,
		'err_group' => 64,
		'err_text' => "Handpay Request",
		'err_level' => 1,
		], [
		'err_code' => 82,
		'err_group' => 8192,
		'err_text' => "Handpay Reset",
		'err_level' => 1,
		], [
		'err_code' => 83,
		'err_group' => 128,
		'err_text' => "No Progressive Info",
		'err_level' => 1,
		], [
		'err_code' => 84,
		'err_group' => 128,
		'err_text' => "Progressive Win",
		'err_level' => 1,
		], [
		'err_code' => 85,
		'err_group' => 64,
		'err_text' => "Handpay Request Cancelled",
		'err_level' => 1,
		], [
		'err_code' => 86,
		'err_group' => 8192,
		'err_text' => "SAS Progressive Level Hit",
		'err_level' => 1,
		], [
		'err_code' => 87,
		'err_group' => 8192,
		'err_text' => "System Validation Request",
		'err_level' => 1,
		], [
		'err_code' => 95,
		'err_group' => 8192,
		'err_text' => "Tip Awarded To Dealer",
		'err_level' => 1,
		], [
		'err_code' => 96,
		'err_group' => 8,
		'err_text' => "Printer Communication Error",
		'err_level' => 3,
		], [
		'err_code' => 97,
		'err_group' => 8,
		'err_text' => "Printer Out Of Paper",
		'err_level' => 3,
		], [
		'err_code' => 102,
		'err_group' => 8192,
		'err_text' => "Cashout Button Pressed",
		'err_level' => 1,
		], [
		'err_code' => 103,
		'err_group' => 8,
		'err_text' => "Ticket Inserted",
		'err_level' => 0,
		], [
		'err_code' => 104,
		'err_group' => 256,
		'err_text' => "Ticket Transfer Done",
		'err_level' => 1,
		], [
		'err_code' => 105,
		'err_group' => 8192,
		'err_text' => "AFT Transfer Done",
		'err_level' => 0,
		], [
		'err_code' => 106,
		'err_group' => 8192,
		'err_text' => "AFT Request Host Cashout",
		'err_level' => 1,
		], [
		'err_code' => 107,
		'err_group' => 8192,
		'err_text' => "AFT Request Host Cashout Win",
		'err_level' => 1,
		], [
		'err_code' => 108,
		'err_group' => 8192,
		'err_text' => "AFT Request Register",
		'err_level' => 1,
		], [
		'err_code' => 109,
		'err_group' => 8192,
		'err_text' => "AFT Registration Acknowledged",
		'err_level' => 1,
		], [
		'err_code' => 110,
		'err_group' => 1,
		'err_text' => "AFT Registration Cancelled",
		'err_level' => 1,
		], [
		'err_code' => 111,
		'err_group' => 1,
		'err_text' => "Game Locked",
		'err_level' => 1,
		], [
		'err_code' => 112,
		'err_group' => 1,
		'err_text' => "Buffer Overflow",
		'err_level' => 1,
		], [
		'err_code' => 113,
		'err_group' => 1,
		'err_text' => "Change Lamp On",
		'err_level' => 1,
		], [
		'err_code' => 114,
		'err_group' => 1,
		'err_text' => "Change Lamp Off",
		'err_level' => 1,
		], [
		'err_code' => 116,
		'err_group' => 1,
		'err_text' => "Printer Paper Low",
		'err_level' => 1,
		], [
		'err_code' => 117,
		'err_group' => 1,
		'err_text' => "Printer Power Off",
		'err_level' => 1,
		], [
		'err_code' => 118,
		'err_group' => 1,
		'err_text' => "Printer Power On",
		'err_level' => 1,
		], [
		'err_code' => 120,
		'err_group' => 1,
		'err_text' => "Printer Carriage Jammed",
		'err_level' => 1,
		], [
		'err_code' => 122,
		'err_group' => 1,
		'err_text' => "Gaming Machine Soft (lifetime-to-date) Meters Reset to Zero",
		'err_level' => 1,
		], [
		'err_code' => 123,
		'err_group' => 1,
		'err_text' => "Bill Validator (period) Totals Reset By Attendant",
		'err_level' => 1,
		], [
		'err_code' => 124,
		'err_group' => 8192,
		'err_text' => "Host Bonus Awarded",
		'err_level' => 1,
		], [
		'err_code' => 126,
		'err_group' => 1,
		'err_text' => "Game Started",
		'err_level' => 1,
		], [
		'err_code' => 127,
		'err_group' => 1,
		'err_text' => "Game Ended",
		'err_level' => 1,
		], [
		'err_code' => 130,
		'err_group' => 1,
		'err_text' => "Menu On",
		'err_level' => 1,
		], [
		'err_code' => 131,
		'err_group' => 1,
		'err_text' => "Menu Off",
		'err_level' => 1,
		], [
		'err_code' => 132,
		'err_group' => 1,
		'err_text' => "Self Test Or Operator Menu Has Been Entered",
		'err_level' => 1,
		], [
		'err_code' => 133,
		'err_group' => 1,
		'err_text' => "Self Test Or Operator Menu Has Been Exited",
		'err_level' => 1,
		], [
		'err_code' => 134,
		'err_group' => 1,
		'err_text' => "Gaming Machine Is Out Of Service (by attendant)",
		'err_level' => 2,
		], [
		'err_code' => 140,
		'err_group' => 1,
		'err_text' => "Game Selected",
		'err_level' => 1,
		], [
		'err_code' => 152,
		'err_group' => 4,
		'err_text' => "Power Off Card Cage Door Access",
		'err_level' => 0,
		], [
		'err_code' => 153,
		'err_group' => 4,
		'err_text' => "Power Off Slot Door Access",
		'err_level' => 0,
		], [
		'err_code' => 154,
		'err_group' => 4,
		'err_text' => "Power Off Cashbox Door Access",
		'err_level' => 0,
		], [
		'err_code' => 155,
		'err_group' => 4,
		'err_text' => "Power Off Drop Door Access",
		'err_level' => 0,
		], [
		'err_code' => 257,
		'err_group' => 8,
		'err_text' => "Logic Error",
		'err_level' => 4,
		], [
		'err_code' => 258,
		'err_group' => 2,
		'err_text' => "Corner Door Open",
		'err_level' => 3,
		], [
		'err_code' => 259,
		'err_group' => 2,
		'err_text' => "Corner Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 260,
		'err_group' => 2,
		'err_text' => "Middle Door Open",
		'err_level' => 3,
		], [
		'err_code' => 261,
		'err_group' => 2,
		'err_text' => "Middle Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 262,
		'err_group' => 2,
		'err_text' => "Dropbox Door Open",
		'err_level' => 3,
		], [
		'err_code' => 263,
		'err_group' => 2,
		'err_text' => "Dropbox Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 264,
		'err_group' => 4,
		'err_text' => "Power Off Card Cage Door Open",
		'err_level' => 1,
		], [
		'err_code' => 265,
		'err_group' => 4,
		'err_text' => "Power Off Card Cage Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 266,
		'err_group' => 4,
		'err_text' => "Power Off Main Door Open",
		'err_level' => 1,
		], [
		'err_code' => 267,
		'err_group' => 4,
		'err_text' => "Power Off Main Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 268,
		'err_group' => 4,
		'err_text' => "Power Off Bill Stacker Door Open",
		'err_level' => 1,
		], [
		'err_code' => 269,
		'err_group' => 4,
		'err_text' => "Power Off Bill Stacker Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 270,
		'err_group' => 4,
		'err_text' => "Power Off Dropbox Door Open",
		'err_level' => 1,
		], [
		'err_code' => 271,
		'err_group' => 4,
		'err_text' => "Power Off Dropbox Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 272,
		'err_group' => 4,
		'err_text' => "Power Off Corner Door Open",
		'err_level' => 1,
		], [
		'err_code' => 273,
		'err_group' => 4,
		'err_text' => "Power Off Corner Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 274,
		'err_group' => 4,
		'err_text' => "Power Off Middle Door Open",
		'err_level' => 1,
		], [
		'err_code' => 275,
		'err_group' => 4,
		'err_text' => "Power Off Middle Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 276,
		'err_group' => 4,
		'err_text' => "Power Off Service Door Open",
		'err_level' => 1,
		], [
		'err_code' => 277,
		'err_group' => 4,
		'err_text' => "Power Off Service Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 278,
		'err_group' => 4,
		'err_text' => "Power Off Bill Door Open",
		'err_level' => 1,
		], [
		'err_code' => 279,
		'err_group' => 4,
		'err_text' => "Power Off Bill Door Closed",
		'err_level' => 1,
		], [
		'err_code' => 280,
		'err_group' => 8,
		'err_text' => "Jackpot Server Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 281,
		'err_group' => 8,
		'err_text' => "Jackpot Server Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 282,
		'err_group' => 8,
		'err_text' => "Intrusion Connection Lost",
		'err_level' => 1,
		], [
		'err_code' => 283,
		'err_group' => 8,
		'err_text' => "Intrusion Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 284,
		'err_group' => 8,
		'err_text' => "Intrusion EEPROM Error",
		'err_level' => 1,
		], [
		'err_code' => 285,
		'err_group' => 8,
		'err_text' => "Touchscreen Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 286,
		'err_group' => 8,
		'err_text' => "Touchscreen Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 287,
		'err_group' => 8,
		'err_text' => "Mechanical Counters Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 288,
		'err_group' => 8,
		'err_text' => "Mechanical Counters Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 289,
		'err_group' => 8,
		'err_text' => "Mechanical Buttons Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 290,
		'err_group' => 8,
		'err_text' => "Mechanical Buttons Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 291,
		'err_group' => 8,
		'err_text' => "Top Lamps Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 292,
		'err_group' => 8,
		'err_text' => "Top Lamps Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 293,
		'err_group' => 8,
		'err_text' => "Border Lights Connection Lost",
		'err_level' => 1,
		], [
		'err_code' => 294,
		'err_group' => 8,
		'err_text' => "Border Lights Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 295,
		'err_group' => 1,
		'err_text' => "Gamble Entered",
		'err_level' => 1,
		], [
		'err_code' => 296,
		'err_group' => 1,
		'err_text' => "Gamble Exited",
		'err_level' => 1,
		], [
		'err_code' => 297,
		'err_group' => 1,
		'err_text' => "Gaming Machine Is Back To Service (by attendant)",
		'err_level' => 1,
		], [
		'err_code' => 298,
		'err_group' => 128,
		'err_text' => "Jackpot Win",
		'err_level' => 2,
		], [
		'err_code' => 299,
		'err_group' => 16,
		'err_text' => "Credit Key In",
		'err_level' => 1,
		], [
		'err_code' => 300,
		'err_group' => 1024,
		'err_text' => "Credit AFT In",
		'err_level' => 1,
		], [
		'err_code' => 301,
		'err_group' => 1024,
		'err_text' => "Credit AFT Bonus In",
		'err_level' => 1,
		], [
		'err_code' => 302,
		'err_group' => 2048,
		'err_text' => "Credit AFT Out",
		'err_level' => 1,
		], [
		'err_code' => 303,
		'err_group' => 8192,
		'err_text' => "Credit Key Out",
		'err_level' => 1,
		], [
		'err_code' => 304,
		'err_group' => 64,
		'err_text' => "Printing Handpay Receipt",
		'err_level' => 1,
		], [
		'err_code' => 305,
		'err_group' => 1,
		'err_text' => "Printer Communication Restore",
		'err_level' => 1,
		], [
		'err_code' => 306,
		'err_group' => 1,
		'err_text' => "Printer Paper Insert",
		'err_level' => 1,
		], [
		'err_code' => 307,
		'err_group' => 1,
		'err_text' => "Printer Paper Low Cleared",
		'err_level' => 1,
		], [
		'err_code' => 308,
		'err_group' => 1,
		'err_text' => "Printer Jam Cleared",
		'err_level' => 1,
		], [
		'err_code' => 309,
		'err_group' => 1,
		'err_text' => "Bill Jam Cleared ",
		'err_level' => 1,
		], [
		'err_code' => 310,
		'err_group' => 1,
		'err_text' => "Bill Stacker Full Cleared",
		'err_level' => 1,
		], [
		'err_code' => 311,
		'err_group' => 1,
		'err_text' => "Bill Stacker Jam",
		'err_level' => 1,
		], [
		'err_code' => 312,
		'err_group' => 1,
		'err_text' => "Bill Stacker Jam Cleared",
		'err_level' => 1,
		], [
		'err_code' => 313,
		'err_group' => 1,
		'err_text' => "System Time Changed",
		'err_level' => 1,
		], [
		'err_code' => 314,
		'err_group' => 1,
		'err_text' => "KBD Controller Not Detected",
		'err_level' => 3,
		], [
		'err_code' => 315,
		'err_group' => 1,
		'err_text' => "Top Lamp Controller Not Detected",
		'err_level' => 3,
		], [
		'err_code' => 316,
		'err_group' => 1,
		'err_text' => "Ticket Is Not Printed",
		'err_level' => 1,
		], [
		'err_code' => 317,
		'err_group' => 1,
		'err_text' => "Ticket Printed",
		'err_level' => 1,
		], [
		'err_code' => 318,
		'err_group' => 1,
		'err_text' => "Counter Failed",
		'err_level' => 1,
		], [
		'err_code' => 319,
		'err_group' => 1,
		'err_text' => "Short Circuit Counter",
		'err_level' => 1,
		], [
		'err_code' => 320,
		'err_group' => 1,
		'err_text' => "Short Circuit Counter State",
		'err_level' => 1,
		], [
		'err_code' => 321,
		'err_group' => 1,
		'err_text' => "Disconnected Counters Lamp",
		'err_level' => 1,
		], [
		'err_code' => 322,
		'err_group' => 1,
		'err_text' => "Short Counters Lamp",
		'err_level' => 1,
		], [
		'err_code' => 323,
		'err_group' => 1,
		'err_text' => "Wrong Power Level Mechanical Counters",
		'err_level' => 1,
		], [
		'err_code' => 324,
		'err_group' => 1,
		'err_text' => "Validation ID Configured",
		'err_level' => 1,
		], [
		'err_code' => 325,
		'err_group' => 8,
		'err_text' => "Bill Communication Error",
		'err_level' => 3,
		], [
		'err_code' => 326,
		'err_group' => 1,
		'err_text' => "Bill Communication Restored",
		'err_level' => 1,
		], [
		'err_code' => 327,
		'err_group' => 1,
		'err_text' => "Attendant Key Inserted",
		'err_level' => 0,
		], [
		'err_code' => 328,
		'err_group' => 1,
		'err_text' => "Game Unlocked",
		'err_level' => 1,
		], [
		'err_code' => 329,
		'err_group' => 1,
		'err_text' => "MCS Connection Lost",
		'err_level' => 3,
		], [
		'err_code' => 330,
		'err_group' => 1,
		'err_text' => "MCS Connection Restored",
		'err_level' => 1,
		], [
		'err_code' => 331,
		'err_group' => 1,
		'err_text' => "Authorization Expires After 1 Hour",
		'err_level' => 1,
		], [
		'err_code' => 332,
		'err_group' => 1,
		'err_text' => "Authorization Required",
		'err_level' => 1,
		], [
		'err_code' => 333,
		'err_group' => 1,
		'err_text' => "PIC Restart Attempt",
		'err_level' => 1,
		], [
		'err_code' => 334,
		'err_group' => 1,
		'err_text' => "Authorization Completed",
		'err_level' => 1,
		], [
		'err_code' => 335,
		'err_group' => 1,
		'err_text' => "PIC Communication Fail",
		'err_level' => 1,
		], [
		'err_code' => 336,
		'err_group' => 1,
		'err_text' => "PIC Communication Restored",
		'err_level' => 1,
		], [
		'err_code' => 337,
		'err_group' => 8192,
		'err_text' => "Mystery JP Prize Awarded",
		'err_level' => 1,
		], [
		'err_code' => 338,
		'err_group' => 1,
		'err_text' => "Bill Firmware Changed",
		'err_level' => 3,
		], [
		'err_code' => 339,
		'err_group' => 1,
		'err_text' => "Ticket Printer Chassis Open",
		'err_level' => 3,
		], [
		'err_code' => 340,
		'err_group' => 1,
		'err_text' => "Ticket Printer Chassis Closed",
		'err_level' => 1,
		], [
		'err_code' => 341,
		'err_group' => 1,
		'err_text' => "Hardware Platform Unknown",
		'err_level' => 3,
		], [
		'err_code' => 342,
		'err_group' => 8,
		'err_text' => "SAS Validation Buffer Full",
		'err_level' => 3,
		], [
		'err_code' => 343,
		'err_group' => 1,
		'err_text' => "SAS Validation Buffer Full Cleared",
		'err_level' => 1,
		], [
		'err_code' => 344,
		'err_group' => 1,
		'err_text' => "RGB Controller Not Detected",
		'err_level' => 3,
		], [
		'err_code' => 345,
		'err_group' => 1,
		'err_text' => "RGB Controler Communication Error",
		'err_level' => 3,
		], [
		'err_code' => 346,
		'err_group' => 1,
		'err_text' => "Restore Communication With RGB Controler",
		'err_level' => 1,
		], [
		'err_code' => 347,
		'err_group' => 1,
		'err_text' => "Mechanical Counters Not Detected",
		'err_level' => 3,
		], [
		'err_code' => 348,
		'err_group' => 8,
		'err_text' => "SAS Net Down",
		'err_level' => 3,
		], [
		'err_code' => 349,
		'err_group' => 1,
		'err_text' => "SAS Net Up",
		'err_level' => 1,
		], [
		'err_code' => 350,
		'err_group' => 1,
		'err_text' => "Reboot",
		'err_level' => 1,
		], [
		'err_code' => 351,
		'err_group' => 1,
		'err_text' => "Abnormal Printing Sequence",
		'err_level' => 3,
		], [
		'err_code' => 352,
		'err_group' => 1,
		'err_text' => "Exception Cleared By Attendant",
		'err_level' => 1,
		], [
		'err_code' => 353,
		'err_group' => 1,
		'err_text' => "Card Reader Communication Error",
		'err_level' => 3,
		], [
		'err_code' => 354,
		'err_group' => 1,
		'err_text' => "Restore Communication With Card Reader",
		'err_level' => 1,
		], [
		'err_code' => 355,
		'err_group' => 16384,
		'err_text' => "Game Server Disconnected",
		'err_level' => 3,
		], [
		'err_code' => 356,
		'err_group' => 16384,
		'err_text' => "Game Server Connected",
		'err_level' => 1,
		], [
		'err_code' => 357,
		'err_group' => 16384,
		'err_text' => "Accounting server disconnected",
		'err_level' => 3,
		], [
		'err_code' => 358,
		'err_group' => 16384,
		'err_text' => "Accounting server connected",
		'err_level' => 1,
		],

		];

		//
		foreach ($data as $d)
		{
			PsErrorsList::create($d);
		}
    	//DB::table('ps_errors_list')->insert($data);
    }
}