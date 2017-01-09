   <div id="myMap" style="width: 600px; height: 500px;" ></div>

    <script>
    var map;
      function initMap() {
        // Create a map object and specify the DOM element for display.
        map = new google.maps.Map(document.getElementById('myMap'), {
          center: {lat: 25.5366199, lng: -103.4412948},

          zoom: 15,
           

        });
      }
    </script>
     <script src="https://maps.googleapis.com/maps/api/place/autocomplete/json?input=Paris&types=geocode&key=AIzaSyBPc0IqUH5Kc7aTNQlfMDXEcJFVglGC9DI">
    </script>
    <AutocompletionResponse>
    <status>OK</status>
    <prediction>
        <description>Paris, France</description>
        <type>locality</type>
        <type>political</type>
        <type>geocode</type>
        <reference>CjQlAAAA1123n ...reference truncated in this example</reference>
        <id>691b237b0322f28988f3ce03e321ff72a12167fd</id>
        <term>
            <value>Paris</value>
            <offset>0</offset>
        </term>
        <term>
            <value>France</value>
            <offset>7</offset>
        </term>
        <matched_substring>
            <offset>0</offset>
            <length>5</length>
        </matched_substring>
        <place_id>ChIJD7fiBh9u5kcRYJSMaMOCCwQ</place_id>
    </prediction>
    <prediction>
        <description>Paris, TX, United States</description>
        <type>locality</type>
        <type>political</type>
        <type>geocode</type>
        <reference>CjQwAAAAkcg ...reference truncated in this example</reference>
        <id>518e47f3d7f39277eb3bc895cb84419c2b43b5ac</id>
        <term>
            <value>Paris</value>
            <offset>0</offset>
        </term>
        <term>
            <value>TX</value>
            <offset>7</offset>
        </term>
        <term>
            <value>United States</value>
            <offset>11</offset>
        </term>
        <matched_substring>
            <offset>0</offset>
            <length>5</length>
        </matched_substring>
        <place_id>ChIJmysnFgZYSoYRSfPTL2YJuck</place_id>
    </prediction>
    <prediction>
        <description>Parish Circle, Fremont, CA, United States</description>
        <type>route</type>
        <type>geocode</type>
        <reference>CjQtAAAAXLc ...reference truncated in this example</reference>
        <id>782d60eda4d5d46f120e17fa810d77f88211fabd</id>
        <term>
            <value>Parish Circle</value>
            <offset>0</offset>
        </term>
        <term>
            <value>Fremont</value>
            <offset>15</offset>
        </term>
        <term>
            <value>CA</value>
            <offset>24</offset>
        </term>
        <term>
            <value>United States</value>
            <offset>28</offset>
        </term>
        <matched_substring>
            <offset>0</offset>
            <length>5</length>
        </matched_substring>
        <place_id>EilQYXJpc2ggQ2lyY2xlLCBGcmVtb250LCBDQSwgVW5pdGVkIFN0YXRlcw</place_id>
    </prediction>
    <prediction>
        <description>Paris Street, San Francisco, CA, United States</description>
        <type>route</type>
        <type>geocode</type>
        <reference>CkQyAAAAdeGx ...reference truncated in this example</reference>
        <id>dfa238c4ec5e8936bbf38b6e38a19336004ccc63</id>
        <term>
            <value>Paris Street</value>
            <offset>0</offset>
        </term>
        <term>
            <value>San Francisco</value>
            <offset>14</offset>
        </term>
        <term>
            <value>CA</value>
            <offset>29</offset>
        </term>
        <term>
            <value>United States</value>
            <offset>33</offset>
        </term>
        <matched_substring>
            <offset>0</offset>
            <length>5</length>
        </matched_substring>
        <place_id>Ei5QYXJpcyBTdHJlZXQsIFNhbiBGcmFuY2lzY28sIENBLCBVbml0ZWQgU3RhdGVz</place_id>
    </prediction>
    <prediction>
        <description>Parish Avenue, Fremont, CA, United States</description>
        <type>route</type>
        <type>geocode</type>
        <reference>CjQtAAAAUE60ow ...reference truncated in this example</reference>
        <id>280c7fb40ec22eae174b9d3a42b97e9fb87fd4e9</id>
        <term>
            <value>Parish Avenue</value>
            <offset>0</offset>
        </term>
        <term>
            <value>Fremont</value>
            <offset>15</offset>
        </term>
        <term>
            <value>CA</value>
            <offset>24</offset>
        </term>
        <term>
            <value>United States</value>
            <offset>28</offset>
        </term>
        <matched_substring>
            <offset>0</offset>
            <length>5</length>
        </matched_substring>
        <place_id>EilQYXJpc2ggQXZlbnVlLCBGcmVtb250LCBDQSwgVW5pdGVkIFN0YXRlcw</place_id>
    </prediction>
    <debug_log/>
</AutocompletionResponse>

    <?php
{
   "debug_log" : {
      "line" : []
   },
   "predictions" : [
      {
         "description" : "Paris, France",
         "id" : "691b237b0322f28988f3ce03e321ff72a12167fd",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "ChIJD7fiBh9u5kcRYJSMaMOCCwQ",
         "reference" : "CjQlAAAAuxj ...reference truncated in this example",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris"
            },
            {
               "offset" : 7,
               "value" : "France"
            }
         ],
         "types" : [ "locality", "political", "geocode" ]
      },
      {
         "description" : "Paris, TX, United States",
         "id" : "518e47f3d7f39277eb3bc895cb84419c2b43b5ac",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "ChIJmysnFgZYSoYRSfPTL2YJuck",
         "reference" : "CjQwAAAAP9K-T ...reference truncated in this example",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris"
            },
            {
               "offset" : 7,
               "value" : "TX"
            },
            {
               "offset" : 11,
               "value" : "United States"
            }
         ],
         "types" : [ "locality", "political", "geocode" ]
      },
      {
         "description" : "Parish Circle, Fremont, CA, United States",
         "id" : "782d60eda4d5d46f120e17fa810d77f88211fabd",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "EilQYXJpc2ggQ2lyY2xlLCBGcmVtb250LCBDQSwgVW5pdGVkIFN0YXRlcw",
         "reference" : "CjQtAAAAH2oo ...reference truncated in this example",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Parish Circle"
            },
            {
               "offset" : 15,
               "value" : "Fremont"
            },
            {
               "offset" : 24,
               "value" : "CA"
            },
            {
               "offset" : 28,
               "value" : "United States"
            }
         ],
         "types" : [ "route", "geocode" ]
      },
      {
         "description" : "Paris Street, San Francisco, CA, United States",
         "id" : "dfa238c4ec5e8936bbf38b6e38a19336004ccc63",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "Ei5QYXJpcyBTdHJlZXQsIFNhbiBGcmFuY2lzY28sIENBLCBVbml0ZWQgU3RhdGVz",
         "reference" : "CkQyAAAAv5moC8ay ...reference truncated in this example",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Paris Street"
            },
            {
               "offset" : 14,
               "value" : "San Francisco"
            },
            {
               "offset" : 29,
               "value" : "CA"
            },
            {
               "offset" : 33,
               "value" : "United States"
            }
         ],
         "types" : [ "route", "geocode" ]
      },
      {
         "description" : "Parish Avenue, Fremont, CA, United States",
         "id" : "280c7fb40ec22eae174b9d3a42b97e9fb87fd4e9",
         "matched_substrings" : [
            {
               "length" : 5,
               "offset" : 0
            }
         ],
         "place_id" : "EilQYXJpc2ggQXZlbnVlLCBGcmVtb250LCBDQSwgVW5pdGVkIFN0YXRlcw",
         "reference" : "CjQtAAAAlJ-x ...reference truncated in this example",
         "terms" : [
            {
               "offset" : 0,
               "value" : "Parish Avenue"
            },
            {
               "offset" : 15,
               "value" : "Fremont"
            },
            {
               "offset" : 24,
               "value" : "CA"
            },
            {
               "offset" : 28,
               "value" : "United States"
            }
         ],
         "types" : [ "route", "geocode" ]
      }
   ],
   "status" : "OK"
}
    ?>