</div> <!-- end display contents -->
<?php
$data_collector = Kriss_Data_Collector::get_instance();
$collected_data = $data_collector->get_all_data();

// Structure based on the source HTML
$final_data = [
    "cms" => isset($collected_data['home']) ? $collected_data['home'] : []
];

// Sections that should be at the top level of data.data
$top_level_sections = [
    'front-desk', 'consultation-room', 'surgery-room', 'doctors-office',
    'server-room', 'administration-room', 'aftercare', 'setup',
    'plans', 'about', 'faq', 'privacy-policy', 'terms-and-conditions'
];

foreach ( $top_level_sections as $section ) {
    if ( isset($collected_data[$section]) ) {
        $final_data[$section] = $collected_data[$section];
    } else {
        $final_data[$section] = [];
    }
}

$json_data = json_encode([
    null,
    [
        "type" => "data",
        "data" => array_merge($final_data, ["locale" => "en"]),
        "uses" => (object)[]
    ],
    null
]);
?>
<script>
    {
        window.__sveltekit_nybw8 = {
            base: new URL(".", location).pathname.slice(0, -1)
        };

        const data = <?php echo $json_data; ?>;

        const element = document.querySelector('div[style="display: contents"]');

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
