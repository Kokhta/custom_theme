</div> <!-- end display contents -->
<?php
$data_collector = Kriss_Data_Collector::get_instance();
$collected = $data_collector->get_all_data();

// The source HTML shows data structured with keys like "home", "front-desk", etc.
// In the source HTML, home is inside cms, and other keys are siblings of cms.
// Actually, let me re-check the source JSON structure.
// "data":[null,{"type":"data","data":{cms:{home:{...}, "front-desk":{...}, ...}}, "locale":"en"}, "uses":{}, null]
// Wait, looking closer at the source:
// {"type":"data","data":{cms:{home:{...}, "front-desk":{...}, ...}}, "locale":"en"}
// Yes, everything is inside 'cms'.

$cms_data = [];
$sections = [
    'home', 'front-desk', 'consultation-room', 'surgery-room', 'doctors-office',
    'server-room', 'administration-room', 'aftercare', 'setup',
    'plans', 'about', 'faq', 'privacy-policy', 'terms-and-conditions'
];

foreach ($sections as $s) {
    if (isset($collected[$s])) {
        $cms_data[$s] = $collected[$s];
    }
}

$json_data = json_encode([
    null,
    [
        "type" => "data",
        "data" => [
            "cms" => $cms_data,
            "locale" => "en"
        ],
        "uses" => (object)[]
    ],
    null
]);
?>
<script>
    {
        __sveltekit_nybw8 = {
            base: new URL(".", location).pathname.slice(0, -1)
        };

        const element = document.querySelector('div[style="display: contents"]');
        const data = <?php echo $json_data; ?>;

        Promise.all([
            import("<?php echo esc_url( home_url( '_app/immutable/entry/start.Ry2uuYv8.js' ) ); ?>"),
            import("<?php echo esc_url( home_url( '_app/immutable/entry/app.CAZ2oA04.js' ) ); ?>")
        ]).then(([kit, app]) => {
            kit.start(app, element, {
                node_ids: [0, 2, 4],
                data,
                form: null,
                error: null
            });
        });
    }
</script>
<?php wp_footer(); ?>
</body>
</html>
