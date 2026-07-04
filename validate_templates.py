import json
import os

def validate_template(file_path):
    print(f"Validating {file_path}...")
    try:
        with open(file_path, 'r') as f:
            data = json.load(f)

        required_keys = ["title", "type", "version", "content"]
        for key in required_keys:
            if key not in data:
                print(f"  FAILED: Missing key '{key}'")
                return False

        if data["type"] != "page":
             print(f"  FAILED: 'type' must be 'page', got '{data['type']}'")
             return False

        if not isinstance(data["content"], list) or len(data["content"]) == 0:
             print(f"  FAILED: 'content' must be a non-empty list")
             return False

        print("  PASSED")
        return True
    except Exception as e:
        print(f"  FAILED: Error parsing JSON: {e}")
        return False

def main():
    templates_dir = "elementor-templates"
    files = [f for f in os.listdir(templates_dir) if f.endswith(".json")]

    all_passed = True
    for f in files:
        if not validate_template(os.path.join(templates_dir, f)):
            all_passed = False

    if all_passed:
        print("\nAll templates validated successfully!")
    else:
        print("\nSome templates failed validation.")
        exit(1)

if __name__ == "__main__":
    main()
